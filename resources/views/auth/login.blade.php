@extends('layouts.app')

@section('content')
<style>

        body{
            background-image: url(https://images.pexels.com/photos/1260312/pexels-photo-1260312.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            font-family: Arial, Helvetica, sans-serif;
        },
        
        h1,h2,h3,h4,h5,h6{
            color: #110077;
            font-weight: 500;
        }
        
</style>

<div class="container" style="height: 450px">
    <div class="row">
            
        <div class="col-md-8 col-md-offset-2" style="padding-left: 20px">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading">
                        <h3 style="color: #110077;font-weight: 500;"><b>Log-in to your account</b></h3>
                </div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-outline-info">
                                    Login
                                </button>
                             
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="background-image: url();padding-top: 20px;margin-top: 30px">
            </div>

    </div>
</div>
@endsection
