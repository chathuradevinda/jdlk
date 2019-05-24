@extends('layouts.app')

@section('content')
<style>
    a:hover{
        color: green;
    }
    
    body{
        background-image: url(https://images.pexels.com/photos/1260312/pexels-photo-1260312.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
        font-family: Arial, Helvetica, sans-serif;
    },
    
    h3{
        color: #110077;
        font-weight: 500;
    }
    
</style>

<div class="container" style="height: 100%;padding: 5%">
    <h3 style="color: #110077;font-weight: 500;"><b>Update Your Skills</b></h3>
    <hr class="my-4">
    {!! Form::open(['action'=>'TradepersonSkillsController@store','method'=>'POST'])!!}
    <div class="form-group">     
        <b>{{Form::label('expertise','Select your expertises')}}</b>
        <br>
        @foreach ($expertises as $item)
            <input type="checkbox"  name="expertise[]" value="{{$item->id}}"> {{$item->title}}<br>
        @endforeach
    </div>
    <div class="form-group">     
        <b>{{Form::label('introduction','Please describe yourself briefly')}}</b>
        {{Form::textarea('introduction','',['class'=>'form-control','placeholder'=>'About Yourself','rows'=>'3'])}}
    </div>
   
    <div class="form-group">     
        <b>{{Form::label('qualifications','Qualifications that you have achieved')}}</b>
        {{Form::textarea('qualifications','',['class'=>'form-control','placeholder'=>'About Your Qualifications','rows'=>'3'])}}
    </div>
   
    {{Form::submit('Reset',['class'=>'btn btn-danger'])}}
    {{Form::submit('Submit',['class'=>'btn btn-info'])}}

    {!! Form::close()!!}
    
    <br><br>
    
</div>

@endsection