    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
    <a class="navbar-brand" href="/jobdone/public">{{config('app.name','JOB DONE')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarColor02">
                <!-- Authentication Links -->
            
                @if (Auth::guest())
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class='fas fa-user'></i> Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class='fas fa-user-edit'></i> Register</a></li>
                    </ul>
                @else
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user()->type=='1')
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/home_a">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/expertise/create">Manage Expertise</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/specialization/create">Manage Specialization</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/question/create">Manage Questions</a></li>  
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/resource/create">Manage Resources</a></li>  
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="/jobdone/public/loadjobdetails">Manage Jobs</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/jobdone/public/loadjobdetails">Pending</a>
                                    <a class="dropdown-item" href="/jobdone/public/loadjobdetails/index_assigned">Assigned</a>
                                    <a class="dropdown-item" href="/jobdone/public/loadjobdetails/index_completed">Completed</a>
                                    <a class="dropdown-item" href="/jobdone/public/loadjobdetails/index_rejected">Rejected</a>
                                </div>
                            </li>  
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/servicearea/create">Manage Areas</a></li>  
                        @endif
                        @if (Auth::user()->type=='2')
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/home_c">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/job/create">Get Quotation</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Cost Guide</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/local">Meet Experts</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/loadjobdetails/my_jobs">My Jobs</a></li>
                        @endif
                        @if (Auth::user()->type=='3')                            
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/home_tp">Dashboard</a></li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="/jobdone/public/pendingjobs">My Jobs</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/jobdone/public/pendingjobs/index_assigned">Assigned</a>
                                    <a class="dropdown-item" href="/jobdone/public/pendingjobs/index_accepted">Accepted</a>
                                    <a class="dropdown-item" href="/jobdone/public/pendingjobs/index_completed">Completed</a>
                                    <a class="dropdown-item" href="/jobdone/public/pendingjobs/index_rejected">Rejected</a>
                                </div>
                            </li>  
                            <li class="nav-item"><a class="nav-link" href="#">How it works</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/tradepersonskills">My Skills</a></li>
                            <li class="nav-item"><a class="nav-link" href="/jobdone/public/myfeedbacks">My Feedbacks</a></li>  
                        @endif
                    </ul>    
            


                <ul class="navbar-nav ml-auto">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                     <a class="dropdown-item" href="/jobdone/public/profile/edit_profile"><i class='fas fa-user-edit'></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="dropdown-item"> <i class='fas fa-angle-right'></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
