@extends('layouts.window')
@section('content')
    <div class="container">
        {!! Form::open(['action'=>'PendingJobsController@store','method'=>'POST'])!!}
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
            <tr>
                <th>Remarks</th>
                <td>{{$item->remarks}}</td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td>{{$item->start_date}}</td>
            </tr>
            <tr>
                <th>Remarks by Supervisor</th>
                <td>{{$item->remarks}}</td>
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
        <hr>

        
        @if ($tradeperson_remarks===Null)
            <p>No data</p>
    
        @else
        <p><b>Tradeperson Remarks Thread</b></p>
        <table class="table table-borderless">
            <th>Remark</th><th>Date</th>
            @foreach ($tradeperson_remarks as $item)
                <tr>
                    <td>{{$item->remarks}}</td>    
                    <td>{{$item->created_at}}</td> 
                </tr>   
            @endforeach
        </table>
                      
        @endif

<br>
        <div class="form-group">     
                {{Form::label('remarks','Remarks')}}
                {{Form::text('remarks','',['class'=>'form-control','placeholder'=>'Remarks'])}}
        </div>

        <div class="form-group">     
                {{Form::label('next_action','Action')}}
                <select name="next_action" class="form-control">
                            <option value="" disabled>--Select Action--</option>
                            <option value="accepted">Accept</option>
                            <option value="rejected">Reject</option>
                            <option value="completed">Complete</option>
                </select>
        </div>
        {{Form::reset('Reset',['class'=>'btn btn-outline-danger btn-sm'])}}
        {{Form::submit('Update Changes',['class'=>'btn btn-outline-info btn-sm'])}}
        
        {!! Form::close()!!}
        <br>
        <br>
    </div>
@endsection
