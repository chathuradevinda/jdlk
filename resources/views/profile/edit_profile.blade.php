@extends('layouts.app')

@section('content')
<div class="container" style="width:60%; height: 100%;padding: 5%;margin-left: 0px">
    <h5>Personal Information</h5>
    <hr class="3">
    {!! Form::open(['action'=>'ProfileController@store','method'=>'POST'])!!}
    <table class="table table-borderless">
    @foreach ($user as $u)
        <div class="form-group">
            <tr>
                <th>
                    {{Form::label('first_name','First Name')}}
                </th>
                <td>
                    {{Form::text('first_name',@$u->first_name,['class'=>'form-control','placeholder'=>'First Name'])}}
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <th>
                    {{Form::label('last_name','Last Name')}}
                </th>
                <td>
                    {{Form::text('last_name',@$u->last_name,['class'=>'form-control','placeholder'=>'Last Name'])}}
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <th>
                    {{Form::label('nic','NIC')}}
                </th>
                <td>
                        {{Form::text('nic',@$u->nic,['class'=>'form-control','placeholder'=>'NIC'])}}
                </td>
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <th>
                    {{Form::label('email','Email')}}
                </th>
                <td>
                        {{Form::text('email',@$u->email,['class'=>'form-control','placeholder'=>'Email'])}}
                </td>
            </tr>
        </div>
        @endforeach
        <br>
    </table> 
    <br>
    <h5>Contact Information</h5>
    <hr class="3">
        @if (count($user_mores)>0)
        <table class="table table-borderless">
            {{Form::text('output','update',['class'=>'form-control','hidden'])}}
            @foreach ($user_mores as $user_more)
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('residence','Contact Number - Residence')}}
                        </th>
                        <td>
                            {{Form::text('residence',@$user_more->residence,['class'=>'form-control','placeholder'=>'Contact Number - Residence'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_1','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_1',@$user_more->mobile_1,['class'=>'form-control','placeholder'=>'Contact Number - Mobile'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_2','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_2',@$user_more->mobile_2,['class'=>'form-control','placeholder'=>'Contact Number - Mobile'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_3','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_3',@$user_more->mobile_3,['class'=>'form-control','placeholder'=>'Contact Number - Mobile'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_no','No')}}
                        </th>
                        <td>
                            {{Form::text('address_no',@$user_more->address_no,['class'=>'form-control','placeholder'=>'No'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_line_1','Line 1')}}
                        </th>
                        <td>
                            {{Form::text('address_line_1',@$user_more->address_line_1,['class'=>'form-control','placeholder'=>'Line 1'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_line_2','Line 2')}}
                        </th>
                        <td>
                            {{Form::text('address_line_2',@$user_more->address_line_2,['class'=>'form-control','placeholder'=>'Line 2'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_city','City')}}
                        </th>
                        <td>
                            {{Form::text('address_city',@$user_more->address_city,['class'=>'form-control','placeholder'=>'City'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_province','Province')}}
                        </th>
                        <td>
                            {{Form::text('address_province',@$user_more->address_province,['class'=>'form-control','placeholder'=>'Province'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('poastal_code','Poastal Code')}}
                        </th>
                        <td>
                            {{Form::text('poastal_code',@$user_more->poastal_code,['class'=>'form-control','placeholder'=>'Poastal Code'])}}
                        </td>
                    </tr>
                </div>
            @endforeach
        </table>
        @else
        {{Form::text('output','add',['class'=>'form-control','hidden'])}}
        <table class="table table-borderless">
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('residence','Contact Number - Residence')}}
                        </th>
                        <td>
                            {{Form::text('residence','',['class'=>'form-control','placeholder'=>'Contact Number - Residence'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_1','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_1','',['class'=>'form-control','placeholder'=>'Mobile #1'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_2','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_2','',['class'=>'form-control','placeholder'=>'Mobile #2'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('mobile_3','Contact Number - Mobile')}}
                        </th>
                        <td>
                            {{Form::text('mobile_3','',['class'=>'form-control','placeholder'=>'Mobile #3'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_no','No')}}
                        </th>
                        <td>
                            {{Form::text('address_no','',['class'=>'form-control','placeholder'=>'No'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_line_1','Line 1')}}
                        </th>
                        <td>
                            {{Form::text('address_line_1','',['class'=>'form-control','placeholder'=>'Line 1'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_line_2','Line 2')}}
                        </th>
                        <td>
                            {{Form::text('address_line_2','',['class'=>'form-control','placeholder'=>'Line 2'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_city','City')}}
                        </th>
                        <td>
                            {{Form::text('address_city','',['class'=>'form-control','placeholder'=>'City'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('address_province','Province')}}
                        </th>
                        <td>
                            {{Form::text('address_province','',['class'=>'form-control','placeholder'=>'Province'])}}
                        </td>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th>
                            {{Form::label('poastal_code','Poastal Code')}}
                        </th>
                        <td>
                            {{Form::text('poastal_code','',['class'=>'form-control','placeholder'=>'Poastal Code'])}}
                        </td>
                    </tr>
                </div>
        </table>
        @endif

        
        {{Form::submit('Update Profile',['class'=>'btn btn-primary'])}}
        {!! Form::close()!!}
    <br><br>
</div>

@endsection