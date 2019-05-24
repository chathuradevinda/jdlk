@extends('layouts.app')

@section('content')
<div class="container" style="height: 100%;padding: 5%">
    <h1>Specializations | Create</h1>
    {!! Form::open(['action'=>'SpecializationController@store','method'=>'POST'])!!}
    <div class="form-group">
        {{Form::label('expertise_id','Select related Expertise')}}
        

        <select name="expertise_id" class="form-control">
            @foreach ($expertises as $expertise)
                <option value="{{$expertise->id}}">{{$expertise->title}}</option>
            @endforeach
        </select>
       
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
    {!! Form::close()!!}
    
    <br><br>
    <h4>Specializations | View Existing Specializations &nbsp;&nbsp;&nbsp;<a href="/jobdone/public/specialization" class="btn btn-info">View Specializations</a></h4>
    
</div>

@endsection