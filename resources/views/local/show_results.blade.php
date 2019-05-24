@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    h4{
    color: #110077;
    font-weight: 500;
}
span {
  color: orange;
},
a:hover{
    color: green;
},

body{
    background-image: url(https://images.pexels.com/photos/1260312/pexels-photo-1260312.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
    font-family: Arial, Helvetica, sans-serif;
},


</style>
        <div class="jumbotron" style="margin-top: 0px;height: 800px">
            <div class="container">
                <h3 style="color: #110077;font-weight: 500;"><b>Here are the best professional in your area!</b></h3>
                <p>Visit the profile for more information about your tradepersons skills</p> 
                <hr class="my-4">
                @foreach ($tradepersons as $item)
                <div class="media border p-3">
                    <img src="http://icons.iconarchive.com/icons/graphicloads/flat-finance/256/person-icon.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h4>{{$item->first_name}} {{$item->last_name}} <small><i>Bathroom Installing</i></small>
                            <span><button type="button" class="btn btn-outline-primary btn-sm float-right">View Profile</button></span>
                        </h4> 
                        
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                       
                        <p>{{$item->int}}</p>      
                        <p>{{$item->qua}}</p>      
                    </div>
                </div>
                @endforeach
            </div>   
        </div>
@endsection