<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expertise;
use App\Question;
use App\Specialization;
use App\Job;
use App\ExpertiseQuestions;

use DB;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $questions =  Question::all();
        return view('job.create_job');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expertises =  Expertise::all();
        //$specializations =  Specialization::all();->groupBy('expert_id')
        //$specializations = DB::table('specializations')->first();
        return view('jobs.create_job',['expertises'=>$expertises]);

        $expertise_questions = ExpertiseQuestion::all();
        $questions = Question::all();
        
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('specializations')->where($select, $value)->get();
     $output = '<option value="">--Select Specialization--</option>';

     foreach($data as $row)
     {
      $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
     }
     echo $output;
/*
    $expertise_questions = DB::table('expertise_questions')->where('expertise_id', $value)->get(['question_id']);
    $data = json_decode($expertise_questions, true);
    $ans = $data[0]['question_id'];
                        
    $qs2 = Question::whereIn('id',$arr)->get();
    //return ($qs2);*/
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
            'expertise'=>'required',
            'specialization'=>'required'
        ]);

        $job = new Job;
        $job->expertise_id = $request->input('expertise');
        $job->specialization_id = $request->input('specialization');
        $job->user_id = auth()->user()->id;

        $job->save();
            //return ($request->input('specialization'));
        return redirect('jobdetails')->with('success','Job Added');
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
