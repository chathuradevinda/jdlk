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
<div class="container" style="height: 550px;padding: 50px">
        <table class="table table-borderless">
                <tr>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">My Skills <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">My Feedbacks <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">How it works <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">New Jobs <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">Ongoing Projects <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                    <td>
                        <div class="card bg-info text-white" style="height:100px">
                            <div class="card-header"  style="height:100px">FAQs <i class="fa fa-chevron-circle-right float-right" style="font-size:24px"></i></div>
                        </div>
                    </td>
                </tr>
            </table>
</div>


@endsection
