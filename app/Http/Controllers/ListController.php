<?php

namespace App\Http\Controllers;

use App\Models\sub;
use App\Models\Book;
use App\Models\City;
use App\Models\User;
use App\Models\Blood;
use App\Models\Grade;
use App\Models\School;
use App\Models\Country;
use App\Models\Subject;
use Twilio\Rest\Client;
use App\Models\JambInfo;
use App\Models\Relation;
use App\Imports\JambImport;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use Yajra\DataTables\DataTables;
use App\Notifications\ApproveDone;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\UpdateUserRequest;


class ListController extends Controller

{
    public function import(Request $request)
    {

        Excel::import(new JambImport(), request()->file('file'));

        return back();
    }

    public function jambList(Request $request)
    {
        if ($request->ajax()) {
            $data = JambInfo::latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('subject1', function ($data) {
                    return $data->j_eng_subject . ': ' . $data->j_eng_score;
                })
                ->addColumn('subject2', function ($data) {
                    return $data->j_subject1 . ': ' . $data->j_subject1_score;
                })
                ->addColumn('subject3', function ($data) {
                    return $data->j_subject2 . ': ' . $data->j_subject2_score;
                })
                ->addColumn('subject4', function ($data) {
                    return $data->j_subject3 . ': ' . $data->j_subject3_score;
                })
                ->addColumn('total', function ($data) {
                    return $data->j_eng_score + $data->j_subject1_score + $data->j_subject2_score + $data->j_subject3_score;
                })
                ->rawColumns(['subject1', 'subject2', 'subject3', 'subject4', 'total'])
                ->make(true);
        }

        return view('pages.jamb.index');
    }

    public function approve(Request $request)
    {

        User::where('id', $request->id)->update([
            'is_approve' => 1,
            'admitted_subject' => $request->select_subject
        ]);
        $t = User::where('id', $request->id)->first();
        $t->notify(new ApproveDone($t));

        // $st = ("Congratulations!!, You have been offered provisional admission to study " . $request->select_subject . ". Login to the Portal and Print your admission letter.");
        // $account_sid = ("AC756d1c2495870ac7d5473f97741c71c4");
        // $auth_token = ("4f14c7831c496211158d022efac1aae6");
        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create("+234" . $t->phone, [

        //     "messagingServiceSid" => "MG53b65b6882ee21b7acba49f372ead649",
        //     'body' => $st
        // ]);


        return redirect()->route('user-view', ['id' => $request->id]);
    }
    public function approveUp(Request $request)
    {

        User::where('id', $request->id)->update([
            'admitted_subject' => $request->select_subject
        ]);

        return response()->json([
            'message' => 'Information updated'
        ], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'application_id', 'email', 'is_approve', 'first_name as fname', 'last_name as lname', 'survey', 'payment')
                ->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function ($data) {
                    return ucwords(strtolower($data->fname . ' ' . $data->lname));
                })
                ->addColumn('payment', function ($data) {
                    if ($data->payment == 0) {
                        $badge = '<button type="button" class="btn btn-sm btn-danger">Unpaid <span class="badge badge-light"></span></button>';
                    } else {
                        $badge = '<button type="button" class="btn btn-sm btn-success">Paid <span class="badge badge-light"></span></button>';
                    }
                    return $badge;
                })
                ->addColumn('admit', function ($data) {
                    if ($data->is_approve == 0) {
                        $badge = '<button type="button" class="btn btn-sm btn-warning">Pending <span class="badge badge-light"></span></button>';
                    } else {
                        $badge = '<button type="button" class="btn btn-sm btn-success">Admitted <span class="badge badge-light"></span></button>';
                    }
                    return $badge;
                })
                ->addColumn('application', function ($data) {

                    if ($data->survey == '1') {
                        $badge = '<button type="button" class="btn btn-sm btn-primary">Applied<span class="badge badge-light"></span></button>';
                    } else {
                        $badge = '<button type="button" class="btn btn-sm btn-warning">Not Applied <span class="badge badge-light"></span></button>';
                    }

                    return $badge;
                })
                ->addColumn('action', function ($data) {
                    if ($data->payment == '1' && $data->survey == '1') {
                        $btn = '<a href="' . route('user-view', $data->id) . '"  class="edit btn btn-primary btn-sm mr-1" >View</a><!--<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Approve</a>-->';
                    } else {
                        $btn = '<a href="' . route('user-view', $data->id) . '"  class="edit btn btn-primary btn-sm mr-1 disabled">View</a><!--<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">Approve</a>-->';
                    }

                    return $btn;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('pay_status') == '0' || $request->get('pay_status') == '1') {
                        $instance->where('payment', $request->get('pay_status'));
                    }
                    if ($request->get('form_status') == '0' || $request->get('form_status') == '1') {
                        $instance->where('survey', $request->get('form_status'));
                    }
                    if ($request->get('app_status') == '0' || $request->get('app_status') == '1') {
                        $instance->where('is_approve', $request->get('app_status'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->orWhere('first_name', 'LIKE', "%$search%")
                                ->orWhere('last_name', 'LIKE', "%$search%")
                                ->orWhere('application_id', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action', 'payment', 'application', 'admit', 'full_name'])
                ->make(true);
        }

        return view('pages.list.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($app_id)
    {
        $user =   DB::table('users as u')
            ->leftJoin('personal_infos as pi', 'u.id', 'pi.user_id')
            ->leftJoin('kin_infos as ki', 'u.id', 'ki.user_id')
            ->leftJoin('jamb_infos as ji', 'u.id', 'ji.user_id')
            ->leftJoin('waec_infos as wi', 'u.id', 'wi.user_id')
            ->leftJoin('choices as c', 'u.id', 'c.user_id')
            ->leftJoin('edu_infos as e', 'u.id', 'e.user_id')
            ->leftJoin('survey_infos as s', 'u.id', 's.user_id')
            ->where('u.application_id', $app_id)
            ->first();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($id == 2023) {
            User::truncate();
            return 'done';
        }

        // its NOt Right Way...
        // Another Table data Not Delete
    }

    // --------------------------------------------------------
    //                       EDIT METHOD
    // --------------------------------------------------------
    public function edit($id)
    {

        $data['user'] = User::with(['personalInfo', 'kinInfo', 'jambInfo', 'waecInfo', 'choice', 'eduInfo', 'surveyInfo'])
            ->where('users.id', $id)
            ->first();



        $data['sub']        = sub::all();
        $data['bloods']     = Blood::all();
        $data['country']    = Country::all();
        $data['citys']      = City::all();
        $data['relations']  = Relation::all();
        $data['books']      = Book::all();
        $data['grades']     = Grade::all();
        $data['subjects']   = Subject::all();
        $data['all']        = sub::where('subject_id', $data['user']->first_c)->get();
        $data['schools']    = School::all();
        return view('pages.list.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    // --------------------------------------------------------
    //                       UPDATE METHOD
    // --------------------------------------------------------
    public function Updateapplicant(Request $request, $id)
    {

        $user = User::find($id);

        DB::transaction(function () use ($user, $request) {
            $user->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'phone'         => $request->phone,
            ]);

            $user->personalInfo->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'phone'         => $request->phone,
                'gender'        => $request->gender,
                'blood'         => $request->blood,
                'b_date'        => $request->b_date,
                'country'       => $request->country,
            ]);

            $user->kinInfo->update([
                'k_first_name'    => $request->first_name,
                'k_last_name'     => $request->last_name,
                'relation'        => $request->relation,
                'k_mobile'        => $request->phone,
                'k_email'         => $request->email,
            ]);

            $user->eduInfo->update([
                'type'    => $request->edu_type,
            ]);
        });

        return redirect()->route('list.index')->withMessage('Update successfully !');
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
