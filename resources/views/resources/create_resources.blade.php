@extends('layouts.app')

@section('content')
<div class="container" style="height: 100%;padding: 5%">
    <h1>Resources | Create</h1>
    {!! Form::open(['action'=>'ResourceController@store','method'=>'POST'])!!}
    <div class="form-group">     
        {{Form::label('name','Name')}}
        {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('model','Model')}}
        {{Form::text('model','',['class'=>'form-control','placeholder'=>'Model'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('category','Category')}}
        {{Form::text('category','',['class'=>'form-control','placeholder'=>'Category'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('unit_price','Unit Price')}}
        {{Form::text('unit_price','',['class'=>'form-control','placeholder'=>'Unit Price'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('amount','Amount')}}
        {{Form::text('amount','',['class'=>'form-control','placeholder'=>'Amount'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('trademark','Trademark')}}
        {{Form::text('trademark','',['class'=>'form-control','placeholder'=>'Trademark'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('description','Description')}}
        {{Form::text('description','',['class'=>'form-control','placeholder'=>'Description'])}}
    </div>
    
    <div class="form-group">     
        {{Form::label('expire_date','Expire Date')}}
        {{Form::date('expire_date','',['class'=>'form-control','placeholder'=>'Expire Date'])}}
    </div>    
    
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close()!!}
    
    <br><br>
    <h4>Resources | View Existing Resources &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-info">View Resources</button></h4>
    
</div>

@endsection