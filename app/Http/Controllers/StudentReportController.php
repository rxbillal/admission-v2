<?php

namespace App\Http\Controllers;


use App\Models\Subject;
use App\Models\sub;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class StudentReportController extends Controller
{


    //------------------------------------------------------------------//
    //                        GET INDEX METHOD                          //
    //------------------------------------------------------------------//
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sub_id = $request->input('subject');
            $select_subject = Sub::find($sub_id);

            $data = User::select('id', 'application_id', 'email', 'phone', 'first_name as fname', 'last_name as lname', 'admitted_subject');

            if ($select_subject) {
                $data->where(function($q) use ($select_subject) {
                    $q->where('admitted_subject', 'LIKE', '%' . $select_subject->sub_name . '%')
                      ->orWhereNull('admitted_subject');
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function ($data) {
                    return ucwords(strtolower($data->fname . ' ' . $data->lname));
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-sm">Action</button>';
                })
                ->rawColumns(['application_id', 'full_name', 'email', 'phone', 'action'])
                ->make(true);
        }



        $data['departments'] = Subject::all();
        $data['sub'] = Sub::all();
        $data['subjects'] = User::pluck('admitted_subject', 'admitted_subject')->unique();
        $data['states'] = City::all();

        return view('pages.report.student-report', $data);
    }

    //------------------------------------------------------------------//
    //                 GET SUBJECT LIST METHOD                          //
    //------------------------------------------------------------------//
    public function sub_List()
    {
        $departments = Subject::all();
        $sub = Sub::all();

        return response()->json([
            'department_list' => $departments,
            'subject_list' => $sub
        ], 200);
    }

}
