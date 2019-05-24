@extends('layouts.window')
@section('content')



<style>
        .slidecontainer {
          width: 100%;
        }
        
        .slider {
          -webkit-appearance: none;
          width: 100%;
          height: 25px;
          background: #d3d3d3;
          outline: none;
          opacity: 0.7;
          -webkit-transition: .2s;
          transition: opacity .2s;
        }
        
        .slider:hover {
          opacity: 1;
        }
        
        .slider::-webkit-slider-thumb {
          -webkit-appearance: none;
          appearance: none;
          width: 25px;
          height: 25px;
          background: #4CAF50;
          cursor: pointer;
        }
        
        .slider::-moz-range-thumb {
          width: 25px;
          height: 25px;
          background: #4CAF50;
          cursor: pointer;
        }
        </style>
        
    <div class="container">
     

        {!! Form::open(['action'=>'FeedbackController@store','method'=>'POST'])!!}
        <br>
        <h4 style="color: gray">Job Details</h4>
        @foreach ($job_details as $item)
        {{Form::text('job_id',$item->id,['class'=>'form-control','placeholder'=>'Remarks','hidden'=>true])}}
        {{Form::text('tradeperson_id',$item->assigned_to,['class'=>'form-control','placeholder'=>'Remarks','hidden'=>true])}}
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

        
        @endforeach
        <br>
        <h4 style="color: gray">Your feedback means alot to us!</h4>
        <br>

        <div class="form-group"> 
            <tr>
                <th>
                    {{Form::label('review','Comment')}}
                </th>
                <td>
                    {{Form::textarea('review','',['class'=>'form-control','placeholder'=>'Comment','rows'=>3])}}
                </td>    
            </tr>    
        </div>

        <div class="slidecontainer form-group"> 
            <tr>
                <th>
                    {{Form::label('timing_score','Timing: ')}} <span id="demo_1"></span>
                </th>
                <td>
                    <input type="range" name="timing_score" min="1" max="100" value="50" class="slider_1" id="myRange_1"> 
                </td>    
            </tr>    
        </div>
        <div class="slidecontainer form-group"> 
            <tr>
                <th>
                    {{Form::label('budget_score','Budget: ')}} <span id="demo_2"></span>
                </th>
                <td>
                    <input type="range" name="budget_score" min="1" max="100" value="50" class="slider_2" id="myRange_2"> 
                </td>    
            </tr>    
        </div>
        <div class="slidecontainer form-group"> 
            <tr>
                <th>
                    {{Form::label('complete_score','Completeness: ')}} <span id="demo_3"></span>
                </th>
                <td>
                    <input type="range" name="complete_score" min="1" max="100" value="50" class="slider_3" id="myRange_3"> 
                </td>    
            </tr>    
        </div>
        </table>
        {{Form::reset('Reset',['class'=>'btn btn-outline-danger btn-sm'])}}
        {{Form::submit('Update Changes',['class'=>'btn btn-outline-info btn-sm'])}}
        
        {!! Form::close()!!}
        <br>
        <br>
    </div>
    
    <script type="text/javascript">
        var slider_1 = document.getElementById("myRange_1");
        var slider_2 = document.getElementById("myRange_2");
        var slider_3 = document.getElementById("myRange_3");
        var output_1 = document.getElementById("demo_1");
        var output_2 = document.getElementById("demo_2");
        var output_3 = document.getElementById("demo_3");
        output_1.innerHTML = slider_1.value;
        output_2.innerHTML = slider_2.value;
        output_3.innerHTML = slider_3.value;

        
        slider_1.oninput = function() {
            output_1.innerHTML = this.value;
        }
        slider_2.oninput = function() {
            output_2.innerHTML = this.value;
        }
        slider_3.oninput = function() {
            output_3.innerHTML = this.value;
        }
    </script>

            
@endsection
