<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoadJobDetails;
use App\Job;
use App\User;
use App\JobDetails;
use App\Expertise;
use App\Specification;
use App\ExpertiseQuestions;
use DB;

class LoadJobDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where('jobs.status','pending')
        ->get();
        
        return view('loadjobdetails.load_job_details_pending',['job_details'=>$job_details]);
    }


    public function index_assigned()
    {

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where('jobs.status','assigned')
        ->get();
        
        return view('loadjobdetails.load_job_details_assigned',['job_details'=>$job_details]);
    }

    public function index_completed()
    {

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where('jobs.status','completed')
        ->get();
        
        return view('loadjobdetails.load_job_details_completed',['job_details'=>$job_details]);
    }

    public function index_rejected()
    {

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where('jobs.status','rejected')
        ->get();
        
        return view('loadjobdetails.load_job_details_rejected',['job_details'=>$job_details]);
    }

    public function my_jobs()
    {

        $user_id = auth()->user()->id;
        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->orderByRaw("FIELD(jobs.status , 'completed', 'accepted', 'assigned','pending','rejected') ASC")
        ->where('jobs.user_id',$user_id)
        ->get();
        

        //return ($job_details);
        return view('loadjobdetails.my_jobs',['job_details'=>$job_details]);
    }

    public function my_jobs_more_info($id)
    {

     //   $user_id = auth()->user()->id;
        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where('jobs.id',$id)
        ->get();

        $job_details_contacts = DB::table('job_details')
        ->where('id',$id)
        ->get();

        $job_details_tp = DB::table('tradeperson_jobs_actions')
        ->join('users', 'tradeperson_jobs_actions.tradeperson_id', '=', 'users.id')
        ->join('profiles', 'tradeperson_jobs_actions.tradeperson_id', '=', 'profiles.user_id')
        ->where('tradeperson_jobs_actions.job_id',$id)
        ->select('tradeperson_jobs_actions.*','users.*','profiles.*')
        ->get();

        //return ($job_details_tp);
        return view('loadjobdetails.my_jobs_more_info',['job_details'=>$job_details,'job_details_contacts'=>$job_details_contacts,'job_details_tp'=>$job_details_tp]);
    }

    


    public function loadMore()
    {
        
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
        $this->validate($request,[
            'job_id'=>'required',
            'start_date'=>'required',
            'assigned_to'=>'required',
            'status'=>'required',
        ]);


        $id = $request->input('job_id');
        $assigned_to = $request->input('assigned_to');
        $remarks = $request->input('remarks');
        $start_date = $request->input('start_date');
        $status = $request->input('status');

        /*$new_info = DB::table('jobs')->where('id',$id)->first();
        $new_info->assigned_to = $request->input('assigned_to');
        $new_info->remarks = $request->input('remarks');
        $new_info->start_date = $request->input('start_date');
        $new_info->status = $request->input('status');
        $new_info->save();*/
        DB::table('jobs')->where('id', $id )->update(['assigned_to' =>  $assigned_to,'remarks'=>$remarks,'start_date'=>$start_date,'status'=>$status]);

        return view('navs/close_window')->with('success','Job Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_details =  DB::table('jobs')->where('jobs.id',$id)
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->get();

        $job_details->toArray(); //convert json to array
        $result = json_decode($job_details, true); // decode to avoid error
        $e_id = $result[0]['expertise_id']; //extract expertise id
        
        $questions = DB::table('expertise_questions')->where('expertise_id',$e_id)->get();
        $qs2 = ExpertiseQuestions::where('expertise_id',$e_id)->get();
        $qs=$qs2[0]['question_id']; // get question ids related to qs2
        $splitName = explode(',', $qs, 15); //length should be dynamic  
        $question_count =count($splitName);
        $question_set_order['ord'] = "Your Job, Timing, Your Budget";
        
        $question = DB::table('questions')->whereIn('id',$splitName)->orderByRaw("FIELD(category,'Your Job', 'Timing', 'Your Budget')")->get();
        $answers = DB::table('job_detail_questions')->orderBy('question_id', 'ASC')->where('job_id',$id)->get();

        $users = DB::table('users')->where('type',3)->get();

        $question->toArray(); //convert json to array
       // $result_1 = json_decode($question, true);

        $answers->toArray(); //convert json to array
       // $result_2 = json_decode($answers, true);

        $question_answer =  array_merge(json_decode($question, true), json_decode($answers, true));
        //$question_answer = array_combine($result_1[question], $result_2[answer]);
      //  $q = json_encode($question_answer);
        //$answers = DB::table('job_details')->where('id',$id)->get();

     //   return ($images[6]['answer']);
    return view('loadjobdetails.more_info_job_details',['job_details'=>$job_details,'question_count'=>$question_count,'question_answer'=>$question_answer,'users'=>$users]);
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
