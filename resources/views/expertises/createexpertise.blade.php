@extends('layouts.app')

@section('content')
<div class="container" style="height: 100%;padding: 5%">
    <h1>Expertises | Create</h1>
    {!! Form::open(['action'=>'ExpertiseController@store','method'=>'POST'])!!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>

    <div class="form-group">
            {{Form::label('questions','Questions')}}           
                @foreach ($questions as $question)
                    <br>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="qs[]" value="{{$question->id}}">{{$question->question}}</label>
                    </div>
            @endforeach
    </div>

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
    {!! Form::close()!!}
    
    <br><br>
    <h4>Expertises | View Existing Expertises &nbsp;&nbsp;&nbsp;<a href="/jobdone/public/expertise" class="btn btn-info">View Expertises</a></h4>
    
</div>

@endsection