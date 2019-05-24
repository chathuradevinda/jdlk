@extends('layouts.window')
@section('content')
    <div class="container">
        {!! Form::open(['action'=>'LoadJobDetailsController@store','method'=>'POST'])!!}
        <br>
        <h4 style="color: gray">Job Details</h4>
        @foreach ($job_details as $item)
        {{Form::text('job_id',$item->id,['class'=>'form-control','placeholder'=>'Remarks','hidden'=>true])}}

        <table class="table" style="font-size: 14px;height:auto">
            <tr>
                <th>Job ID</th>
                <td>{{$item->id}}</td>
            </tr>
            <tr>
                <th>Expertise in</th>
                <td>{{$item->exp}}</td>
            </tr>
            <tr>
                <th>Specification</th>
                <td>{{$item->spec}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td><i>{{$item->status}}</i></td>
            </tr>
            <tr>
                <th>Posted Date</th>
                <td>{{$item->created_at}}</td>
            </tr>
        </table>
        @endforeach
        <br>

        <table class="table table-hover table-responsive-sm">
            <thead>
                <th>Question</th>    
                <th>Answer</th>    
            </thead>              
            @for ($i = 0; $i < $question_count; $i++)
            <tr>
            <th> 
                {{$question_answer[$i]['question']}}
            </th>
            <td>
                {{$question_answer[$i+$question_count]['answer']}}
            </td>
            </tr> 
            @endfor
        </table>  
        <br>


        <div class="form-group">     
                {{Form::label('remarks','Remarks')}}
                {{Form::text('remarks','',['class'=>'form-control','placeholder'=>'Remarks'])}}
        </div>
        
        <div class="form-group">     
                {{Form::label('start_date','Start Date')}}
                {{Form::date('start_date','',['class'=>'form-control','placeholder'=>'Start Date'])}}
        </div>

        <div class="form-group">     
                {{Form::label('assigned_to','Assign To')}}
                
                <select name="assigned_to" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                        @endforeach
                </select>
        </div>
        <div class="form-group">     
                {{Form::label('status','Status')}}
                <select name="status" class="form-control">
                            <option value="" disabled>--Select Status--</option>
                            <option value="pending">Pending</option>
                            <option value="assigned">Assigned</option>
                            <option value="rejected">Rejected</option>
                            <option value="completed">Completed</option>
                </select>
        </div>

        

        {{Form::reset('Reset',['class'=>'btn btn-outline-danger btn-sm'])}}
        {{Form::submit('Update Changes',['class'=>'btn btn-outline-info btn-sm'])}}
        
        {!! Form::close()!!}
        <br>
        <br>
    </div>
@endsection
