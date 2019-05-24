<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoadJobDetails;
use App\Job;
use App\User;
use App\JobDetails;
use App\Expertise;
use App\Specialization;
use App\ExpertiseQuestions;
use App\PendingJobs;

class FindLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::all();
        $specializations = Specialization::all();
        $areas = DB::table('profiles')->distinct()->get(['address_city']);

        return view('local.local',['expertises'=>$expertises,'specializations'=>$specializations,'areas'=>$areas]);
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
        
      //  $user_id = auth()->user()->id;
        $expertise_id = $request->input('expertise');
        $area = $request->input('area');

      
        $tradepersons = DB::table('profiles')
        ->join('tradeperson_skills','profiles.user_id','=','tradeperson_skills.user_id')->distinct()
        ->join('tradeperson_skills_info','profiles.user_id','=','tradeperson_skills_info.user_id')
        ->join('users','profiles.user_id','=','users.id')
        ->select('profiles.*','users.*', 'tradeperson_skills.introduction as int','tradeperson_skills.qualifications as qua')
        ->where(['profiles.address_city'=>$area])
        ->get();


        return view('local.show_results')->with('tradepersons',$tradepersons);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
