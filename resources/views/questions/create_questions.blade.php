@extends('layouts.app')

@section('content')
<div class="container" style="height: 100%;padding: 5%">
    <h1>Questions | Create</h1>
    {!! Form::open(['action'=>'QuestionsController@store','method'=>'POST'])!!}
    <div class="form-group">     
        {{Form::label('question','Question')}}
        {{Form::text('question','',['class'=>'form-control','placeholder'=>'Question'])}}
    </div>
    
    <div class="form-group">
        {{Form::label('category','Category')}}
        <select name="category" class="form-control">
            <option value="" disabled>--Select Qusetion Category--</option>
            <option value="Timing">Timing</option>
            <option value="Your Job">Your Job</option>
            <option value="Your Budget">Your Budget</option>
        </select>
    </div>
    
    <div class="form-group">
        {{Form::label('answer_type','Answer Type')}}
        <select name="answer_type" class="form-control">
            <option value="" disabled>--Select Answer Type--</option>
            <option value="text">Text Box</option>
            <option value="textarea">Text Area</option>
            <option value="" disabled>Select</option>
            <option value="" disabled>Checkbox</option>
        </select>
    </div>
    
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close()!!}
    
    <br><br>
    <h4>Questions | View Existing Questions &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info">View Questions</button></h4>
    
</div>

@endsection