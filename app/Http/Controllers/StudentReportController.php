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
use PDF;


class StudentReportController extends Controller
{


    //------------------------------------------------------------------//
    //                        GET INDEX METHOD                          //
    //------------------------------------------------------------------//
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sub_id          = $request->input('subject');
             $state          = $request->input('state');
             $start          = $request->input('start_date');
             $end            = $request->input('end_date');
             $select_subject = Sub::find($sub_id);

            $data = User::with('personalInfo')->select('id', 'application_id', 'email', 'phone', 'first_name as fname', 'last_name as lname', 'admitted_subject');

            if ($select_subject) {
                $data->where(function($q) use ($select_subject) {
                    $q->where('admitted_subject', 'LIKE', '%' . $select_subject->sub_name . '%')
                      ->orWhereNull('admitted_subject');
                });
            }

            if($start){
                $data->whereDate('created_at', \Carbon\Carbon::parse($start));
            }
            if($end){
                $data->whereDate('updated_at', \Carbon\Carbon::parse($end));
            }

            if ($state) {
                $data->whereHas('personalInfo', function ($q) use ($state) {
                    $q->where('state', $state);
                });
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function ($data) {
                    return ucwords(strtolower($data->fname . ' ' . $data->lname));
                })
                ->addColumn('city', function ($data) {
                    return ucwords(strtolower(@$data->personalInfo->city->city_name));
                })
                ->rawColumns(['application_id', 'full_name', 'email', 'phone', 'city', 'action'])
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


    //------------------------------------------------------------------//
    //                 GET REPORT PDF METHOD                            //
    //------------------------------------------------------------------//


    public function exportPdf(Request $request)
    {

        $sub_id = $request->input('subject');
        $state = $request->input('state');
        $select_subject = Sub::find($sub_id);

        $data = User::with('personalInfo')
            ->select('id', 'application_id', 'email', 'phone', 'first_name as fname', 'last_name as lname', 'admitted_subject');

        if ($select_subject) {
            $data->where(function ($q) use ($select_subject) {
                $q->where('admitted_subject', 'LIKE', '%' . $select_subject->sub_name . '%')
                    ->orWhereNull('admitted_subject');
            });
        }

        $users = $data->get();

        $chunks = $users->chunk(100);

        $mergedPdf = new \Mpdf\Mpdf();
        foreach ($chunks as $index => $chunk) {
            $tempPdf = storage_path("temp_report_chunk_{$index}.pdf");
            $pdf = PDF::loadView('pages.report.report', compact('chunk'));
            $pdf->save($tempPdf);

            $pageCount = $mergedPdf->SetSourceFile($tempPdf);
            for ($i = 1; $i <= $pageCount; $i++) {
                $tplIdx = $mergedPdf->ImportPage($i);
                $mergedPdf->AddPage();
                $mergedPdf->UseTemplate($tplIdx);
            }
        }

        $mergedPdf->Output('student-report.pdf', 'D');
    }



}
