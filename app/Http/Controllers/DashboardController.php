<?php

namespace App\Http\Controllers;

use App\Models\sub;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin(){
      return view('login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = User::all();
        return view('pages.dashboard.dashboard',compact('all'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user =   DB::table('users as u')
            ->leftJoin('personal_infos as pi','u.id','pi.user_id')
            ->leftJoin('kin_infos as ki','u.id','ki.user_id')
            ->leftJoin('jamb_infos as ji','u.id','ji.user_id')
            ->leftJoin('waec_infos as wi','u.id','wi.user_id')
            ->leftJoin('choices as c','u.id','c.user_id')
            ->leftJoin('edu_infos as e','u.id','e.user_id')
            ->leftJoin('survey_infos as s','u.id','s.user_id')
            ->select('pi.*','ki.*','ji.*','wi.*','c.*','e.*','s.*','u.id','u.email','u.phone','u.survey','u.is_approve','u.payment','u.admitted_subject')
            ->where('u.id',$id)
            ->first();

        $subject = sub::all();
        return view('pages.list.profile',compact('user','id','subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
