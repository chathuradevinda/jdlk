@extends('layouts.app')

@section('content')
<style>
    a:hover{
        color: green;
    }
    
    body{
        background-image: url(https://images.pexels.com/photos/1260312/pexels-photo-1260312.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
        font-family: Arial, Helvetica, sans-serif;
    },
    
    h3{
        color: #110077;
        font-weight: 500;
    }
    
</style>
        <br><br>
        <div class="container" style="height: 400px">
            <div class="container">
                <h3 style="color: #110077;font-weight: 500;"><b>Search for professionals in your area</b></h3>
                <p>Use the following filters</p> 
                <hr class="my-4">
                <table class="table">
                    <tr>
                        <td style="margin:10px;width:350px"><label for="email">Your Location</label></td>
                        <td style="margin:10px;width:350px"><label for="pwd">Trade</label></td>
                        <td style="margin:10px;width:350px"><label for="pwd">Skill</label></td>
                        <td style="margin:10px;width:350px"><label for="pwd"></label></td>
                    </tr>
                    <tr>
                        {!! Form::open(['action'=>'FindLocalController@store','method'=>'POST'])!!}
                        <td style="margin:10px;width:350px">
                            <div class="form-group">
                                <select name="area" class="form-control" name="area">
                                        <option value="">--Select Your Area--</option>
                                        @foreach ($areas as $area)
                                            <option value="{{$area->address_city}}">{{$area->address_city}}</option>
                                        @endforeach
                                </select>    
                            </div>
                        </td>
                        <td style="margin:10px;width:350px">
                            <div class="form-group"> 
                                <select name="expertise" id="expertise" class="form-control input dynamic" data-dependent="specialization">                    
                                    <option value="">--Select Expertise--</option>
                                    @foreach ($expertises as $expertise)
                                        <option value="{{$expertise->id}}">{{$expertise->title}}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </td>
                        
                        <td style="margin:10px;width:350px">
                            <div class="form-group">
                                <select name="specialization" id="specialization" class="form-control input">
                                    <option value="">--Select Specialization--</option>
                                </select>
                            </div>
                        </td>
                        
                        <td style="margin:10px;width:350px">
                            <div class="form-group">   
                                <button type="submit" class="btn btn-info">Browse <i class='fas fa-angle-right'></i></button>
                            </div>
                        </td>
                    {!! Form::close()!!}   
                    </tr>
                </table>
            </div>   
        </div>
        <br><br>


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