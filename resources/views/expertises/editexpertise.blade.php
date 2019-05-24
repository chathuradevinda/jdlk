@extends('layouts.app')

@section('content')
    <div class="container"  style="height: 100%;padding: 5%">
            <h1>Expertises | Edit</h1>
            {!! Form::open(['action'=>['ExpertiseController@update',$expertise->id],'method'=>'POST'])!!}
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',$expertise->title,['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('questions','Questions')}}  
                    
                    {{Form::text('question_id',$question_id,['class'=>'form-control', 'hidden'=>""])}} 
                    @foreach ($question as $q)
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="qss[]" value="{{$q->id}}" checked="">{{$q->question}}</label>
                        </div>
                    @endforeach
        
                    @foreach ($question_2 as $q_2)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="qss[]" value="{{$q_2->id}}">{{$q_2->question}}</label>
                    </div>
                @endforeach
        
                </div>
        
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        
            {!! Form::close()!!}
    </div>

@endsection