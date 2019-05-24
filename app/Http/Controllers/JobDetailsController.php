<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Expertise;
use App\Question;
use App\Specialization;
use App\Job;
use App\ExpertiseQuestions;
use App\JobDetails;
use App\JobDetailQuestions;

class JobDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id  = Auth::id(); //get user id
        $current_job =  DB::table('jobs')->where('user_id', $user_id)->latest()->first(); //get the current job
        $c_id = $current_job->id; //get the current job id
        
        $e_id = $current_job->expertise_id; //related expertise of the current job
        $s_id = $current_job->specialization_id; //related specialization of the current job
        
        // $e_title =  Expertise::select('title')->where('id',$e_id)->get();
        $e_title =  DB::table('expertises')->where('id',$e_id)->first(); //load expertise titles
        $expertise = $e_title->title;
        
        $s_title =  DB::table('specializations')->where('id',$s_id)->first(); //load specialization titles
        $specialization = $s_title->title;
        


        //loading questions related to expertise
        $questions = DB::table('expertise_questions')->where('expertise_id',$e_id)->get();
        $qs2 = ExpertiseQuestions::where('expertise_id',$e_id)->get();
        $qs=$qs2[0]['question_id']; // get question ids related to qs2
        $splitName = explode(',', $qs, 15); //length should be dynamic  
        $question_count =count($splitName);
        $question_set_order['ord'] = "Your Job, Timing, Your Budget";
        $question = DB::table('questions')->whereIn('id',$splitName)->orderByRaw("FIELD(category,'Your Job', 'Timing', 'Your Budget')")->get();

       // return ($question);
       return view('jobs.job_details',['expertise'=>$expertise,'specialization'=>$specialization,'user_id'=>$user_id,'questions'=>$question,'job_id'=>$c_id,'question_count'=>$question_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'poastal_code'=>'required',
            'contact_no'=>'required',
        ]);


        $question_count = $request->input('question_count');

        for ($i=1; $i <= $question_count; $i++) { 
            $job_details = new JobDetailQuestions;
            $job_details->job_id = $request->input('job_id');
            $job_details->question_id = $i;
            $job_details->answer = $request->input($i);
            $job_details->save();
        }
        

        $personal_info = new JobDetails;
        $personal_info->id = $request->input('job_id');
        $personal_info->first_name = $request->input('first_name');
        $personal_info->last_name = $request->input('last_name');
        $personal_info->email = $request->input('email');
        $personal_info->poastal_code = $request->input('poastal_code');
        $personal_info->contact_no = $request->input('contact_no');
        $personal_info->save();
       // return ($job_details);
        return redirect('../public/job/create')->with('success','Job Posted');
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
