<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expertise;
use App\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializations =  Specialization::all();
        return view('specialization.specialization')->with('specializations',$specializations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($expertise_id=null)
    {
        $expertises = Expertise::all();
        //$plucked = $expertise->pluck('id', 'title');
        //$plucked->all();
        return view('specialization.create_specialization',['expertise_id'=>$expertise_id,'expertises'=>$expertises]);
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
            'expertise_id'=>'required',
        ]);

        $specialization = new Specialization;
        $specialization->title = $request->input('title');
        $specialization->expertise_id = $request->input('expertise_id');
        $specialization->save();

        return redirect('specialization')->with('success','Specialization Added');
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
