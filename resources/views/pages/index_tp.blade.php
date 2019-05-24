@extends('layouts.app')
@section('content')
<style>
        a:hover{
            color: white;
        },
        
        body{
            background-color: #f7f7f7;
            font-family: Arial, Helvetica, sans-serif;
        },
        
        h1,h3{
            color: #110077;
            font-weight: 500;
        },
        
        #areas{
            background-image: url('./resources/assets/images/jd_areas_1.jpg');
        }
        
</style>
<div class="jumbotron" style="background-image: url(https://images.pexels.com/photos/1571174/pexels-photo-1571174.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);margin-top: 0px;">
    
</div>
<br>

<div class="container">
    <h3 style="text-align: center;color: #110077;font-weight: 500;"><b>Most Popular Jobs</b></h3>
    <br>
    <div>
        <table class="table table-borderless">
            <tr>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/214/214275.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Painter and Decorator</h6>
                                <p class="card-text">Internal Painting and decorating</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/363/363683.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Electrician</h6>
                                <p class="card-text">Electrical installation and testing</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/1683/1683011.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Plumber</h6>
                                <p class="card-text">Bathroom, Kitchen and WC plumbing</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/1683/1683011.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Plumber</h6>
                                <p class="card-text">Plumbing repair and maintenance</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/1652/1652482.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Gas/Heating Engineer</h6>
                                <p class="card-text">installation and repair</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="http://example.com" style="text-decoration:none">
                        <div class="media">
                            <div class="media-left media-top">
                                <img src="https://image.flaticon.com/icons/svg/1606/1606352.svg" class="media-object" style="width:60px;margin:5px">
                            </div>
                            <div class="media-body">
                                <h6 class="card-title" style="color: darkblue">Plasterer/Renderer</h6>
                                <p class="card-text">Plaster Skimming</p>
                            </div>
                            <div class="media-left media-top">
                                    <i class='fas fa-angle-right'></i>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>
<br>
<hr class="3">
<br>
<div class="container">
    <h3 style="text-align: center;color: #110077;font-weight: 500;"><b>How our service works</b></h3>
    <br>
    <br>
    <table class="table table-borderless">
        <tr>
            <td>
                <div class="media">
                    <img src="../resources/assets/images/jd_step_1.png" class="align-self-start mr-3" style="width:60px">
                    <div class="media-body">
                        <h3 style="color: #110077;font-weight: 200;">Create a Job</h3>
                        <p>Tell us what you need</p>
                    </div>
                </div>
            </td>
            <td>
                <div class="media">
                    <img src="../resources/assets/images/jd_step_2.png" class="align-self-start mr-3" style="width:60px">
                    <div class="media-body">
                        <h3 style="color: #110077;font-weight: 200;">Get the quotation</h3>
                        <p>Select best fitting option</p>
                    </div>
                </div>
            </td>
            <td>
                <div class="media">
                    <img src="../resources/assets/images/jd_step_3.png" class="align-self-start mr-3" style="width:60px">
                    <div class="media-body">
                        <h3 style="color: #110077;font-weight: 200;">Rate and Review</h3>
                        <p>Leave feedback and rate</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<br>

<div class="container">
    <div id="areas">
        
    
    <h3 style="text-align: center;color: #110077;font-weight: 500;"><b>Our Service Areas</b></h3>
    <br>
    <table class="table table-borderless">
        <div class="row">
            @foreach($service_areas as $add)
                <div class="col-sm-3">
                    <b>{{$add->title}}</b>
                    
                </div>
                
                @if ($loop->iteration % 4 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    </table>
</div>
</div>
<br><br><br><br>

@endsection

  