@extends('client.layouts')


@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
        @include('client.partials.navbar')

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
                                            <img src="{{asset('images/landing/cu-logo.png')}}" class="img-lg img-circle" alt="Profile Picture">
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

           @include('client.partials.mainnav')

        </div>  
    </div>
@endsection