@extends('client.layouts')

@section('content')
    <div id="container" class="cls-container">
        <div id="bg-overlay" class="bg-img" style="background-image:  url({{asset('img/bg-img/bg-img-2.jpg')}});"></div>

        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <div class="mar-var pad-btm">
                        <h1>Client Account Login</h1>
                        <p>Account Sign in Page for Clients.</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/clientlogin') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="checkbox pad-btm text-left">
                               
                                    <input class="magic-checkbox" id="demo-form-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                                    <label for="demo-form-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                                <a class="btn btn-link" href="{{ url('/clientpassword/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection