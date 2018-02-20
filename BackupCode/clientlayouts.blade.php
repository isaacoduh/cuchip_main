<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guard('client')->guest())

                            <!--Client Login and registration Links -->

                            <li><a href="{{ url('/clientlogin') }}">Client Login</a></li>
                            <li><a href="{{ url('/clientregister') }}">Client Registration</a></li>
                       

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::guard('client')->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/clientlogout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/clientlogout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    {{-- Register Code UI original Code --}}
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Client Registration Form</div>

                <div class="panel-body">
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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Login Layout for the Client List --}}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Client Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/clientlogin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/clientpassword/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Original Dashboard --}}


{{-- Client Add User --}}
<div class="boxed">
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fixed-md-200 pull-sm-left fixed-right-border">
        
                            <!-- Simple profile -->
                            <div class="text-center">
                                <div class="pad-ver">
                                    <img src="images/landing/cu-logo.png" class="img-lg img-circle" alt="Profile Picture">
                                </div>
                                <h4 class="text-lg text-overflow mar-no">{{$client->name}}</h4>
                                <p class="text-sm text-muted">{{$client->email}}</p>
        
                                <div class="pad-ver btn-groups">
                                    <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                                    <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                                    <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
                                    <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                                </div>
                                <a class="btn btn-block btn-success btn-lg" href="/clientlogout">Logout</a>
                            </div>
                            <hr>
        
                            <!-- Profile Details -->
                            <p class="pad-ver text-main text-sm text-uppercase text-bold">About</p>
                            <p><i class="demo-pli-information icon-lg icon-fw"></i> {{$client->name}}</p>
                            <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{$client->address}}</p>
                            <p><a href="#" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> http://cuchip.herokuapp.com</a></p>
                            <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i> {{$client->contact}}</p>
                            <p><i class="demo-pli-mail icon-lg icon-fw"></i> {{$client->email}}</p>
        
                            <hr>
                            <p class="pad-ver text-main text-sm text-uppercase text-bold">Client Summary</p>
                            <ul class="list-inline">
                                <li class="tag tag-sm">Casefiles <span class="badge">12</span></li>
                                <li class="tag tag-sm">Attachments <span class="badge">7</span></li>
                                <li class="tag tag-sm">Personel <span class="badge">23</span></li>
                                <li class="tag tag-sm">Infants <span class="badge">56</span></li>
                            </ul>
        
                            <hr>
                            <p class="pad-ver text-main text-sm text-uppercase text-bold">Service Provider Information</p>
                            <p><i class="demo-pli-information icon-lg icon-fw"></i> Covenant University Community Health Impact Program</p>
                            <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> Km 10, Idiroko Road, Ota, Ogun State Nigeria</p>
                            <p><a href="#" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> http://cuchip.herokuapp.com</a></p>
                            <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>(+234) - 12345678</p>
                            <p><i class="demo-pli-mail icon-lg icon-fw"></i> cuchip@gmail.com</p>
                        </div>
                        <div class="fluid">
                            <div class="text-right">
                                {{-- <button class="btn btn-sm btn-primary">Edit Profile</button> --}}
                                <a href="/clientprofile" class="btn btn-sm btn-primary">Back</a>
                                <!-- <button class="btn btn-sm btn-primary">Send Message</button>
                                <button class="btn btn-sm btn-success">Download CV</button> -->
                            </div>
        
                            <hr class="new-section-md bord-no">

                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel" style="background: #ddd;">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Create New User Account</h3>
                                        </div>

                                        <form class="form-horizontal" method="POST" action="{{url('client/user/create') }}">
                                            <div class="panel-body">
                                                {!! csrf_field() !!}

                                                <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                                                    <label for="client_id" class="col-md-4 control-label">Client ID</label>

                                                    <div class="col-md-6">
                                                        <input id="client_id" type="text" class="form-control" name="client_id" value="{{$client->id}}" required autofocus>

                                                        @if ($errors->has('client_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('client_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Name</label>

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

                                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                                    <label for="role" class="col-md-4 control-label">Role</label>

                                                    <div class="col-md-6">
                                                        <select name="role" id="role" class="form-control">
                                                            <option value="">Select Role</option>
                                                            <option value="nurse">Nurse</option>
                                                            <option value="finance">Finance Officer</option>
                                                            <option value="doctor">Doctor</option>
                                                            <option value="operations">Operations Officer</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                                    <label for="role" class="col-md-4 control-label">Role</label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" placeholder="Your Bio" id="bio" name="bio" rows="10">{{old('bio')}}</textarea>

                                                        @if($errors->has('bio'))
                                                            <span class="help-block">
                                                                <strong>{{$errors->first('bio')}}</strong>
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
                                            </div>
                                            <input type="hidden" class="form-group" name="client_id" value="{{ $client->id }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-success" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>

    {{--  --}}
