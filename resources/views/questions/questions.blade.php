@extends('layouts.app')

@section('content')
    <h1>Questions</h1>
    @if (count($questions)>1)
        @foreach ($questions as $question)
            <div class="well">
            <h3>{{$question->question}}</h3>
            <small>Updated at {{$question->created_at}}</small>
            <a href="expertise/{{$question->id}}/edit" class="btn btn-default">Edit</a>
                
            {!!Form::open(['action'=>['QuestionsController@destroy',$question->id],'method'=>'POST','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Remove',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
            
        @endforeach
    @else        
        <p>No questions found.</p>    
    @endif
                
@endsection