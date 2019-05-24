<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $user = DB::table('users')
        ->where('id',$user_id)
        ->get();

        return view('profile.edit_profile')->with('user',$user);
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
            'first_name'=>'required',
            'last_name'=>'required',
            'nic'=>'required',
            'email'=>'required',
        ]);

        $user_id = auth()->user()->id;
        $output = $request->input('output');

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $nic = $request->input('nic');
        $email = $request->input('email');
        DB::table('users')->where('id', $user_id )->update(['first_name' =>  $first_name,'last_name'=>$last_name,'nic'=>$nic,'email'=>$email]);

        if ($output=='add') {
            $profile = new Profile;
            $profile->user_id = $user_id;
            $profile->mobile_1 = $request->input('mobile_1');
            $profile->mobile_2 = $request->input('mobile_2');
            $profile->mobile_3 = $request->input('mobile_3');
            $profile->residence = $request->input('residence');
            $profile->address_no = $request->input('address_no');
            $profile->address_line_1 = $request->input('address_line_1');
            $profile->address_line_2 = $request->input('address_line_2');
            $profile->address_city = $request->input('address_city');
            $profile->address_province = $request->input('address_province');
            $profile->poastal_code = $request->input('poastal_code');
            $profile->save(); 
        }else{
            $mobile_1 = $request->input('mobile_1');
            $mobile_2 = $request->input('mobile_2');
            $mobile_3 = $request->input('mobile_3');
            $residence = $request->input('residence');
            $address_no = $request->input('address_no');
            $address_line_1 = $request->input('address_line_1');
            $address_line_2 = $request->input('address_line_2');
            $address_city = $request->input('address_city');
            $address_province = $request->input('address_province');
            $poastal_code = $request->input('poastal_code');
            
            $matchThese = ['mobile_1' => $mobile_1,'mobile_2' => $mobile_2,'mobile_3' => $mobile_3,'residence' => $residence,'address_no' => $address_no,'address_line_1' => $address_line_1,'address_line_2' => $address_line_2,'address_city' => $address_city,'address_province' => $address_province,'poastal_code' => $poastal_code,];

            DB::table('profiles')->where('user_id', $user_id )->update($matchThese);
        }

        

        return redirect('profile/edit_profile')->with('success','Profile Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = auth()->user()->id;

        $user = DB::table('users')
        ->where('id',$user_id)
        ->get();

        $user_mores = DB::table('profiles')
        ->where('user_id',$user_id)
        ->get();
        

        return view('profile.edit_profile',['user'=>$user,'user_mores'=>$user_mores]);
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
