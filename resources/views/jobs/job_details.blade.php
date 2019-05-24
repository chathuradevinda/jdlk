@extends('layouts.app')

@section('content')

<style>


body{
    background-image: url(https://images.pexels.com/photos/1437493/pexels-photo-1437493.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
    font-family: Arial, Helvetica, sans-serif;
},

h1,h2,h3,h4,h5,h6{
    color: #110077;
    font-weight: 500;
}


input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  
  border: 1px solid #aaaaaa;
}
input.invalid {
  background-color: #ffdddd;
}
.tab {
  display: none;
}
    /* Make circles that indicate the steps of the form: */
    .step {
 /*   height: 15px;
    width: 15px;
    margin: 0 2px;*/
    background-color: #bbbbbb;
    border: none; 
    border-radius: 50%;
   /* display: inline-block;*/
 
    }

    /* Mark the active step: */
    .step.active {
   
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
    background-color: #4CAF50;
    }
</style>

<div class="container" style="height: 100%;padding: 5%">
    <div class="form-group">
        
    
            {!! Form::open(['action'=>'JobDetailsController@store','method'=>'POST','id'=>'regForm'])!!}
            <div class="container" style="width:60%">
                <div class="card border-success text-black">
                <p><input type="text" class="form-control" value="{{$question_count}}" hidden="true" id="" name="question_count"></p>                        
                <p><input type="text" class="form-control" value="{{$job_id}}" id="" hidden="true"  name="job_id"  ></p>                        
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;color: black;font-weight: 700">You've Selected</h5>
                        <h6 class="card-text" style="color: black"><i class="material-icons" style="font-size:48px;color:green;vertical-align: -40%">check_circle</i><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$expertise}}</b> - {{$specialization}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="tab">
                            @foreach ($questions as $q)
                                {{$q->question}}
                                @if ($q->answer_type==='text')
                                    <p><input type="{{$q->answer_type}}" class="form-control" id="" name="{{ $loop->iteration }}" placeholder="" oninput="this.className = ''"></p>
                                @else
                                    <textarea class="form-control" id="" name="{{ $loop->iteration }}" rows="3"  placeholder="" oninput="this.className = 'form-control'"></textarea>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                        <div class="tab">
                            <h5 class="card-title" style="color: black;font-weight: 700">Contact Details</h5>
                            <h6 class="card-text" style="color: gray"><b>Your details will be used to create a job posting, so that you can monitor and manage the job you have posted.</b></h6>
                            <br>
                            <label>First Name:</label>
                            <p><input type="text" class="form-control" id="" name="first_name" placeholder="First Name" oninput="this.className = ''"></p>                        
                            <label>Last Name:</label>
                            <p><input type="text" class="form-control" id="" name="last_name" placeholder="Last Name" oninput="this.className = ''"></p>                        
                            <label>E mail:</label>
                            <p><input type="email" class="form-control" id="" name="email" placeholder="E mail" oninput="this.className = ''"></p>                        
                            <hr class="3">
                            <br>
                            <h5 class="card-title" style="color: black;font-weight: 700">What's the postal code of the property?</h5>
                            <h6 class="card-text" style="color: gray"><b>We use the post code to match you with local tradespeople. Only tradespeople who wants to quote will be able to see your details.</b></h6>
                            <br>
                            <label>Poastal Code:</label>
                            <p><input type="text" class="form-control" id="" name="poastal_code" placeholder="Poastal Code" oninput="this.className = ''"></p>                        
                            <label>Contact Number:</label>
                            <p><input type="text" class="form-control" id="" name="contact_no" placeholder="Contact Number" oninput="this.className = ''"></p>                           
                        </div>
                </div>
            </div>

            <div style="overflow:auto;">
              <div style="float:right;">
                    <br>
                <button type="button" class="btn btn-info" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" class="btn btn-info" id="nextBtn" onclick="nextPrev(1)">Next</button>
              </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>

            </div>
    
            {!! Form::close()!!}
        </div>
</div>


<script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
    
        function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
        }
    
        function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        }
    
        function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input","textarea");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false:
            valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
        }
    
        function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
        }
    
    </script>
    


@endsection