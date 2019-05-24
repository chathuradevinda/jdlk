<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Expertise;
use App\Question;
use App\User;
use App\ExpertiseQuestions;
use DB;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $ut =  auth()->user()->type;
      //  if($ut == '1'){
            $expertises =  Expertise::all();
            return view('expertises.expertise')->with('expertises',$expertises);
     //   }else{
     //      return view('/jobdone/public');
     //   }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return view('expertises.createexpertise',['questions'=>$questions]);
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
            'title'=>'required',
            'qs'=>'required'
        ]);

        $expertise = new Expertise;
        $expertise->title = $request->input('title');
        $expertise->save();

        $insertedId = $expertise->id;

        $expertise_questions = new ExpertiseQuestions;
        $expertise_questions->expertise_id = $insertedId;
        $expertise_questions->question_id = implode(',',$request->qs);
        //$expertise_questions->question_id =$request->extra_services, ','
        $expertise_questions->save();

        return redirect('expertise')->with('success','Expertise Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expertise = Expertise::find($id);
        $questions = Question::all();
        return view('expertises.expertise')->with('expertise',$expertise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matchThese = ['expertise_id' => $id];
        $expertise = Expertise::find($id);
        $qs2 = ExpertiseQuestions::where($matchThese)->get();
        $qs=$qs2[0]['question_id']; // get question ids related to qs2
        $question_id=$qs2[0]['id'];         // get id related to qs2

        $splitName = explode(',', $qs, 15); //length should be dynamic
        
        $question = DB::table('questions')->whereIn('id',$splitName)->get();
        
        $question_2 = DB::table('questions')->whereNotIn('id',$splitName)->get();
        //return ($question_id);

        
        return view('expertises.editexpertise',['expertise'=>$expertise,'question'=>$question,'question_2'=>$question_2,'question_id'=>$question_id]);    
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
        $this->validate($request,[
            'title'=>'required',
            'qss'=>'required',
            'question_id'=>'required'
        ]);

        $expertise = Expertise::find($id);
        $expertise->title = $request->input('title');
        //$expertise->title = $request->input('title');
        //$expertise->qs = $request->input('qs');

      /*  $expertise_questions = new ExpertiseQuestions;
        $expertise_questions->expertise_id = $id;
        $expertise_questions->question_id = $request->input('qss');
        $expertise->save();
        $expertise_questions->save();*/

        //return redirect('expertise')->with('success','Expertise Updated ');
        $qs = $request->input('qss');
        $splitName_2 = implode(',', $qs);
        $expertise_questions = new ExpertiseQuestions;
        $u_id = $request->input('question_id');
        //ExpertiseQuestions::whereId($u_id)->update($request->input('qss'));
        //$expertise_questions->save();

        DB::table('expertise_questions')->where('id', $u_id)->update(['question_id' => $splitName_2]);

        //return ($qs);
        return redirect('expertise')->with('success','Expertise Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expertise = Expertise::find($id);
        $expertise ->delete();
        return redirect('expertise')->with('success','Expertise Removed');;
    }
}
