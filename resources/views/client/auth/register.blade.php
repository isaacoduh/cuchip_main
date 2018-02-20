@extends('client.layouts')

@section('content')
<div id="container" class="cls-container">
    <div id="bg-overlay" class="bg-img" style="background-image: url({{asset('img/bg-img/bg-img-4.jpg')}});"></div>

    <!-- REGISTRATION FORM -->
    <!--===================================================-->

    <div class="cls-content">
        <div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h2">The CUCHIP App</h1>
                    <h1 class="h3">Create a New Client Account</h1>
                    <p>Come join the CUCHIP community! Let's setup your account</p>
                </div>
                <form class="form-horizontal" method="POST" action="{{ url('/clientregister') }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Client Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Address Information</label>

                        <div class="col-md-6">
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                        <label for="contact" class="col-md-4 control-label">Contact Phone Number</label>

                        <div class="col-md-6">
                            <input id="contact" type="phone" class="form-control" name="contact" value="{{ old('contact') }}" required>

                            @if ($errors->has('contact'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

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
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection


