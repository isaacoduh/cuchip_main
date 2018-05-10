@extends('client.layouts')

@section('content')
	<div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
		@include('client.partials.navbar')

		<div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">

                <!--Page content-->
                <!--===================================================-->
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
                                        <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i> {{$client->phone}}</p>
                                        <p><i class="demo-pli-mail icon-lg icon-fw"></i> {{$client->email}}</p>
                    
                                        <hr>
                                        
                    
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
                                            <a href="/client/birthcases/" class="btn btn-sm btn-primary">Back</a>
                                        </div>

                                        <hr class="new-section-md bord-no">
                                        <div class="">
                                            <h4 >New Birthcase (Infant) Information</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <form action="{{ route('client.birthcase.store') }}" class="form-vertical" role="form" method="post">
                                            
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    {{-- Patient's name --}}
                                                    <div class="form-group{{$errors->has('infant_details') ? ' has-error' : ''}}">
                                                        <label for="infant_details" class="control-label"><strong>Infant Name</strong></label>
                                                        <input type="text" name="infant_details" class="form-control" id="infant_details" value="{{old('infant_details') ?: ''}}">
                                                        @if($errors->has('infant_details'))
                                                            <span class="help-block">{{ $errors->first('infant_details')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group{{$errors->has('gender') ? ' has-error' : ''}}">
                                                        <label for="gender" class="control-label"><strong>Gender</strong></label>
                                                        <select name="gender" class="form-control" id="gender" value="{{old('gender') ?: ''}}">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        @if($errors->has('gender'))
                                                            <span class="help-block">{{$errors->first('gender')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group{{$errors->has('date_of_birth') ? ' has-error' : ''}}">
                                                        <label for="date_of_birth" class="control-label"><strong>Date of Birth</strong></label>
                                                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{old('date_of_birth') ?: ''}}">
                                                        @if($errors->has('date_of_birth'))
                                                            <span class="help-block">{{$errors->first('date_of_birth')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="form-group{{$errors->has('parents_info') ? ' has-error' : ''}}">
                                                        <label for="parents_info" class="control-label"><strong>Parents</strong></label>
                                                        <input type="text" name="parents_info" class="form-control" id="parents_info" value="{{old('parents_info') ?: ''}}">
                                                        @if($errors->has('parents_info'))
                                                            <span class="help-block">{{$errors->first('parents_info')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    {{-- The Address --}}
                                                    <div class="form-group{{$errors->has('parents_address') ? ' has-error' : ''}}">
                                                        <label for="city" class="control-label"><strong>Address</strong></label>
                                                        <textarea class="form-control" rows="5" name="parents_address" id="parents_address">{{ old('parents_address') ?: ''}}</textarea>
                                                        @if($errors->has('parents_address'))
                                                            <span class="help-block">{{$errors->first('parents_address')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    {{-- City --}}
                                                    <div class="form-group{{$errors->has('city') ? ' has-error' : ''}}">
                                                        <label for="city" class="control-label"><strong>City</strong></label>
                                                        <input type="text" name="city" class="form-control" id="city" value="{{old('city') ?: ''}}">
                                                        @if($errors->has('city'))
                                                            <span class="help-block">{{ $errors->first('city')}}</span>
                                                        @endif
                                                    </div>
                                                    {{-- State --}}
                                                    <div class="form-group{{$errors->has('state') ? ' has-error' : ''}}">
                                                        <label for="state" class="control-label"><strong>State</strong></label>
                                                        <input type="text" name="state" class="form-control" id="state" value="{{old('state') ?: ''}}">
                                                        @if($errors->has('state'))
                                                            <span class="help-block">{{ $errors->first('state') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group{{$errors->has('phone') ? ' has-error' : ''}}">
                                                        <label for="phone" class="control-label"><strong>Phone</strong></label>
                                                        <input type="phone" name="phone" class="form-control" id="phone" value="{{old('phone') ?: ''}}">
                                                        @if($errors->has('phone'))
                                                            <span class="help-block">{{$errors->first('phone')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-success" type="submit">Submit</button>
                                            </div>
                                            {{-- <input type="hidden" name="_token" value="{{ Session::token() }}"> --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

           @include('client.partials.mainnav')

        </div>  
	</div>
@endsection