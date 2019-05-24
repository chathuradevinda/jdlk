<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expertise;
use App\TradepersonSkills;
use App\User;
use DB;

class TradepersonSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::all();
        return view('tradeperson_skills.add_skills',['expertises'=>$expertises]);
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
            'expertise'=>'required',
        ]);

        $user_id = auth()->user()->id;
        $expertises = $request->input('expertise');

        foreach ($expertises as $ex) {
            $tradeperson_skills = new TradepersonSkills;
            $tradeperson_skills->expertise_id = $ex;
            $tradeperson_skills->user_id=$user_id;
            $tradeperson_skills->save();        
        }

        DB::table('tradeperson_skills')->insert([
            'introduction' => $request->input('introduction'),
            'qualifications' => $request->input('qualifications'),
            'user_id' => $user_id
            ]);

        return redirect('tradepersonskills')->with('success','Skill Added');

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
