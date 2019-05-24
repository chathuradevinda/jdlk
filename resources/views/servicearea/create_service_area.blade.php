@extends('layouts.app')

@section('content')
<div class="container" style="height: 100%;padding: 5%">
    <h1>Service Areas | Create</h1>
    {!! Form::open(['action'=>'ServiceAreaController@store','method'=>'POST'])!!}
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>


    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    
    {!! Form::close()!!}
        
</div>

@endsection