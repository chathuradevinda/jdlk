@extends('layouts.app')

@section('content')
<style>

        body{
            background-image: url(https://images.pexels.com/photos/1329061/pexels-photo-1329061.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            font-family: Arial, Helvetica, sans-serif;
        },
        
        h1,h2,h3,h4,h5,h6{
            color: #110077;
            font-weight: 500;
        }
        
</style>
<div class="container" style="height: 500px;padding: 5%">
    <h3 style="color: #110077;font-weight: 500;"><b>Jobs | Post Your Work Here!</b></h3>
    <p>Post your job here and our professionals will contact you with their quotations to offer you the best service.</p>
    <br>
    
    <div class="container">
        {!! Form::open(['action'=>'JobsController@store','method'=>'POST'])!!}
            <div class="form-group">
                <label for="">Expertise<span style="color: darkblue">*</span></label>
                <select name="expertise" id="expertise" class="form-control input dynamic" data-dependent="specialization">
                        <option value="" disabled="true" selected="true">--Select your tradesmen--</option>
                        @foreach ($expertises as $expertise)
                        <option value="{{$expertise->id}}">{{$expertise->title}}</option>
                        @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Specialization<span style="color: darkblue">*</span></label>
                <select name="specialization" id="specialization" class="form-control input">
                    <option value="">--Select Specialization--</option>
                </select>
            </div>
            
            {{ csrf_field() }}
            {{Form::submit('Post Job',['class'=>'btn btn-info'])}}
    
            {!! Form::close()!!}
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
    
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {
       var select = $(this).attr("id")+'_id';
       var value = $(this).val();
       var dependent = $(this).data('dependent');
       var _token = $('input[name="_token"]').val();
       $.ajax({
        url:"{{ route('job.fetch') }}",
        method:"POST",
        data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
         $('#'+dependent).html(result);
        }
    
       })
      }
     });
    
    
     $('#expertise').change(function(){
      $('#specification').val('');
     });
     
    
    });
    </script>





@endsection


