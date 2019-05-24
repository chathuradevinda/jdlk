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
    <div class="container" style="height: 100%;padding: 5%">
                @if (count($feedback_details)>0)
                    @foreach ($feedback_details as $feedback_detail)

                    <div class="media border p-3"  style="background-color: white">
                        <div class="media-body">
                            <h4>Job ID: {{$feedback_detail->id}} <small><i>by, {{$feedback_detail->fn}} {{$feedback_detail->ln}}</i></small></h4>
                            <p>{{$feedback_detail->review}}</p>
                            <p><b>On </b>{{$feedback_detail->created_at}}</p>
                            <p><b>Timing </b>{{$feedback_detail->time_score}}</p>
                            <p><b>Budget </b>{{$feedback_detail->budget_score}}</p>
                            <p><b>Complete </b>{{$feedback_detail->complete_score}}</p>
                        </div>
                    </div>
                    @endforeach
                @else        
                    <p>No expertise records found.</p>    
                @endif
    </div>
                
@endsection




