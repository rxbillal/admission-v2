<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobFaculty;
use App\Models\JobPos;
use App\Models\JobSubject;
use App\Models\sub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    public function MailCheck($mail){
        $st =JobApplication::where('email',$mail)->count();
        if ($st > 0){
            return response()->json([
                'btn' => true,
                'message' => 'Email already used'
            ],200);
        }else{
            return response()->json([
                'btn' => false,
                'message' => ''
            ],200);
        }
    }
    public function getSubject( $id ){
        $info = sub::where('subject_id', $id)->get();
        return response()->json([
            'subject' => $info
        ],200);
    }
    public function department($id){
        if (is_numeric($id)){
            $dep = JobSubject::where('fac_id',$id)->get();
        }else{
            $dep = JobSubject::all();
        }
       return response()->json([
           'department' => $dep
       ],200);
    }
    public function destroy($id){
        JobApplication::destroy($id);
        return response()->json([
           'message' => 'Application deleted successfully'
        ],200);
    }
    public function jobList(Request $request)
    {
        if ($request->ajax()) {
            $data = JobApplication::latest();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('type', function($data) {
                    if ($data->type == 1){
                        $badge = '<button type="button" class="btn btn-sm btn-primary">Academic <span class="badge badge-light"></span></button>';

                    }else{
                        $badge = '<button type="button" class="btn btn-sm btn-success">Non-Academic <span class="badge badge-light"></span></button>';

                    }
                    return $badge;
                })
                ->addColumn('cv', function($data) {
                    $badge = '<a href="https://application.kum.edu.ng/'.$data->cv.'"><i class="far fa-file-pdf"></i></a>';
                    return $badge;
                })
                ->addColumn('f_name', function($data) {
                    $badge = ucwords(strtolower($data->name));
                    return $badge;
                })
                ->addColumn('position', function($data) {
                    if ($data->type == 1){

                        $badge =ucwords(strtolower(JobPos::find($data->job_id)->job_title));

                    }else{
                        $badge = ucwords(strtolower(Job::find($data->job_id)->job_title));
                    }
                    return $badge;
                })
                ->addColumn('action', function($data) {
                    $badge = '<button class="btn btn-sm btn-danger" onclick="AplicationDelete('.$data->id.')">Delete</button>';
                    return $badge;
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('type') == '1' || $request->get('type') == '2') {
                        $instance->where('type', $request->get('type'));
                    }
                    if ($request->get('faculty')) {
                        $instance->where('fac_id', $request->get('faculty'));
                    }
                    if ($request->get('department')) {
                        $instance->where('dep_id', $request->get('department'));
                    }
                    if ($request->get('course')) {
                        $instance->where('job_id', $request->get('course'));
                    }
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('name', 'LIKE', "%$search%")
                                ->orWhere('phone', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('app_id', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action','cv','type','position','f_name'])
                ->make(true);
        }

        $faculty = JobFaculty::all();
        $job = JobPos::all();

        return view('pages.job-list.index', compact('faculty','job'));
    }
    public function index(){
        return view('job.index');
    }
    public function facList(){
        $fac = JobFaculty::all();
        $job = JobPos::all();
        return response()->json([
            'faculty_list' => $fac,
            'job_list' => $job
        ],200);
    }
    public function limit_text($text, $len) {
        $ret = '';
        foreach (explode(' ', $text) as $word) {
            if (strlen($word) < $len) {
                $ret .= $word.' ';
            }
            $text_words = explode(' ', $word);
            $out = null;


            foreach ($text_words as $w) {
                if ((strlen($w) > $len)) {
                    $out .= substr($w, 0, $len) . ". ";
                }
                /*if ((strlen($out) + strlen($w)) > $len) {
                    $out .= $out . ". ";
                }*/
               // $out .= " " . $w;
            }

            $ret .= $out;
        }
        return $ret;

}

    public function nonAca(){
        $fac = Job::all();
        return response()->json([
            'job_list' => $fac
        ],200);
    }

    public function Aca($id){
        $fac = JobSubject::where('fac_id',$id)->get();
        return response()->json([
            'dep_list' => $fac,
        ],200);
    }
    public function store(Request $request){
        $prev = JobApplication::latest('created_at')->first();
        if ($prev){
            $app = (int) substr($prev->app_id, -4) +1;
        }else{
            $app = "1001";
        }
        if ($request->hasFile('fileToUpload')) {
            $encrypted_propic = strtolower(str_replace(' ', '_', $request->name)).Str::random(8);//Random String
            $target_file = $request->file('fileToUpload');
            $fileExt = $target_file->getClientOriginalExtension(); //Get Extension
            $fileName = $encrypted_propic . '.' . $fileExt; // Concat random string and extension
            if ($request->application_type == 1){
                $path = public_path('uploads/cv/academic');
                $app_id = 'A-'.date('Y').'-'.$app;
                $st = 'uploads/cv/academic/'.$fileName;
            }else{
                $path = public_path('uploads/cv/non-academic');
                $app_id = 'N-'.date('Y').'-'.$app;
                $st = 'uploads/cv/non-academic/'.$fileName;
            }

            $target_file->move($path, $fileName);
        }
        JobApplication::create([
           'app_id' => $app_id,
            'name' => ucwords(strtolower($request->name)),
            'email' => $request->email,
            'phone' => $request->number,
            'type' => $request->application_type,
            'fac_id' => $request->faculty,
            'dep_id' => $request->dep,
            'job_id' => $request->position,
            'cv' => $st,
            'status' => 1
        ]);
        return response()->json([
            'msg' => 'Job request submitted successfully'
        ],200);
    }
}
