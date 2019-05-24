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
use App\Feedback;
use DB;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.feedback');
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
            'review'=>'required',
            'timing_score'=>'required',
            'budget_score'=>'required',
            'complete_score'=>'required',
        ]);

        $feedbacks = new Feedback;
        $feedbacks->job_id = $request->input('job_id');
        $feedbacks->customer_id= auth()->user()->id;
        $feedbacks->tradeperson_id = $request->input('tradeperson_id');
        $feedbacks->review = $request->input('review');
        $feedbacks->time_score = $request->input('timing_score');
        $feedbacks->budget_score = $request->input('budget_score');
        $feedbacks->complete_score = $request->input('complete_score');
        $feedbacks->save();
        //DB::table('feedbacks')->where('id', $id )->update(['assigned_to' =>  $assigned_to,'remarks'=>$remarks,'start_date'=>$start_date,'status'=>$status]);

        return view('navs/close_window')->with('success','Review Added');
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
        $question->toArray();
        $answers->toArray();
        $question_answer =  array_merge(json_decode($question, true), json_decode($answers, true));

        return view('jobs.feedback',['job_details'=>$job_details,'question_count'=>$question_count,'question_answer'=>$question_answer,'users'=>$users]);
  

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

    public function my_jobs_more_info()
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
        return view('loadjobdetails.my_jobs_more_info',['job_details'=>$job_details]);
    }



}
