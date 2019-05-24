<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources =  Resource::all();
        return view('resources.resource')->with('resources',$resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resources.create_resources');
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
            'name'=>'required',
            'model'=>'required',
            'category'=>'required',
            'unit_price'=>'required',
            'amount'=>'required',
            'trademark'=>'required',
            'description'=>'required',
            'expire_date'=>'required',
        ]);

        $resources = new Resource;
        $resources->name = $request->input('name');
        $resources->model = $request->input('model');
        $resources->category = $request->input('category');
        $resources->unit_price = $request->input('unit_price');
        $resources->amount = $request->input('amount');
        $resources->trademark = $request->input('trademark');
        $resources->description = $request->input('description');
        $resources->expire_date = $request->input('expire_date');
        $resources->save();

        return redirect('resource')->with('success','Resource Added');

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
