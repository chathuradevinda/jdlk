<div class="container" style="width:60%">
        <div class="card border-success text-black">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;color: black;font-weight: 700">You've Selected</h5>
                <h6 class="card-text" style="color: black"><i class="material-icons" style="font-size:48px;color:green;vertical-align: -40%">check_circle</i><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$expertise}}</b> - {{$specialization}}</h6>
            </div>
        </div>     
        @foreach ($questions as $q)
            <br>
            <div>
                <div class="card border-success text-black">
                    <div class="card-body">
                        <div class="form-group">     
                            {{Form::label('question',@$q->question)}}
                            @if ($q->answer_type==='text')
                                <input type="{{$q->answer_type}}" class="form-control" id="" name="{{ $loop->iteration }}">
                            @else
                                <textarea class="form-control" id="" name="{{ $loop->iteration }}" rows="3"></textarea>
                            @endif        
                        </div>   
                    </div>
                </div>       
            </div>       
        @endforeach
        <br>
    </div>
</div>

<div class="tab">
    <div class="container" style="width:60%">
        <div class="card border-success text-black">
            <div class="card-body">
                <h5 class="card-title" style="color: black;font-weight: 700">Contact Details</h5>
                <h6 class="card-text" style="color: gray"><b>Your details will be used to create a job posting, so that you can monitor and manage the job you have posted.</b></h6>
                <div class="form-group">     
                    {{Form::label('first_name','First Name')}}
                    {{Form::text('first_name','',['class'=>'form-control','placeholder'=>'First Name','oninput'=>"this.className = ''"])}}
                </div>
                <div class="form-group">     
                    {{Form::label('last_name','Last Name')}}
                    {{Form::text('last_name','',['class'=>'form-control','placeholder'=>'Last Name','oninput'=>"this.className = ''"])}}
                </div>
                <div class="form-group">     
                    {{Form::label('email','Email')}}
                    {{Form::text('email','',['class'=>'form-control','placeholder'=>'E mail','oninput'=>"this.className = ''"])}}
                </div>      
                <br>

                <h5 class="card-title" style="color: black;font-weight: 700">What's the postal code of the property?</h5>
                <h6 class="card-text" style="color: gray"><b>We use the post code to match you with local tradespeople. Only tradespeople who wants to quote will be able to see your details.</b></h6>
                <div class="form-group">     
                    {{Form::label('poastal_code','Poastal Code')}}
                    {{Form::text('poastal_code','',['class'=>'form-control','placeholder'=>'Poastal Code','oninput'=>"this.className = ''"])}}
                </div>
                <div class="form-group">     
                    {{Form::label('contact_no','Contact Number')}}
                    {{Form::text('contact_no','',['class'=>'form-control','placeholder'=>'Contact Number','oninput'=>"this.className = ''"])}}
                </div>


                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                    </div>
                    
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

                    
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>

        </div> 
    </div>