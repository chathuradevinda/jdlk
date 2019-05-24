<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LoadJobDetails;
use App\Job;
use App\User;
use App\JobDetails;
use App\Expertise;
use App\Specification;
use App\ExpertiseQuestions;
use App\PendingJobs;

class PendingJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where(['jobs.assigned_to'=>$user_id,'jobs.status'=>'assigned'])
        ->get();

        return view('pendingjobs.load_pending_jobs',['job_details'=>$job_details]);
    }

    public function index_assigned()
    {
        $user_id = auth()->user()->id;

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where(['jobs.assigned_to'=>$user_id,'jobs.status'=>'assigned'])
        ->get();

        return view('pendingjobs.load_pending_jobs',['job_details'=>$job_details]);
    }

    public function index_accepted()
    {
        $user_id = auth()->user()->id;

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where(['jobs.assigned_to'=>$user_id,'jobs.status'=>'accepted'])
        ->get();

        return view('pendingjobs.load_pending_jobs',['job_details'=>$job_details]);
    }

    public function index_rejected()
    {
        $user_id = auth()->user()->id;

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where(['jobs.assigned_to'=>$user_id,'jobs.status'=>'rejected'])
        ->get();

        return view('pendingjobs.load_pending_jobs',['job_details'=>$job_details]);
    }

    public function index_completed()
    {
        $user_id = auth()->user()->id;

        $job_details = DB::table('jobs')
        ->join('expertises', 'jobs.expertise_id', '=', 'expertises.id')
        ->join('specializations', 'jobs.specialization_id', '=', 'specializations.id')
        ->select('jobs.*', 'expertises.title as exp','specializations.title as spec')
        ->where(['jobs.assigned_to'=>$user_id,'jobs.status'=>'completed'])
        ->get();

        return view('pendingjobs.load_pending_jobs',['job_details'=>$job_details]);
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
            'remarks'=>'required',
            'next_action'=>'required',
        ]);
        $user_id = auth()->user()->id;
        $job_id = $request->input('job_id');

        $pending_jobs = new PendingJobs;
        $pending_jobs->job_id = $request->input('job_id');
        $pending_jobs->tradeperson_id = $user_id;
        $pending_jobs->action = $request->input('next_action');
        $pending_jobs->remarks = $request->input('remarks');
        $pending_jobs->save();
        
        $action = $request->input('next_action');
        DB::table('jobs')->where('id', $job_id)->update(['status'=>$action]);

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
        $status = $result[0]['status']; //extract expertise id
        




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

        //return ($status);

        if($status=='assigned'){
            return view('pendingjobs.more_info_pending_jobs',['job_details'=>$job_details,'question_count'=>$question_count,'question_answer'=>$question_answer,'users'=>$users]);
        }else{
            $tradeperson_remarks = DB::table('tradeperson_jobs_actions')->where('job_id',$id)->get();
            return view('pendingjobs.more_info_pending_jobs',['job_details'=>$job_details,'question_count'=>$question_count,'question_answer'=>$question_answer,'users'=>$users,'tradeperson_remarks'=>$tradeperson_remarks]);
        }
 
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
