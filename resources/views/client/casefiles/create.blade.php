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
                                            <a href="/casefiles" class="btn btn-sm btn-primary">Back</a>
                                        </div>

                                        <hr class="new-section-md bord-no">
                                        <div class="">
                                            <h4 >New Patient Information</h4>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <form action="{{ route('client.casefile.store') }}" class="form-vertical" role="form" method="post">
                                            
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group{{$errors->has('registration_date') ? ' has-error' : ''}}">
                                                        <label for="registration_date" class="control-label">Registration Date</label>
                                                        <input type="date" name="registration_date" class="form-control" id="patient_name" value="{{old('registration_date') ?: ''}}">
                                                        @if($errors->has('registration_date'))
                                                            <span class="help-block">{{ $errors->first('registration_date')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    {{-- The clinic's name and Id --}}
                                                    <div class="form-group{{$errors->has('client_id') ? ' has-error' : ''}}">
                                                        <label for="client_id" class="control-label">Client Info (<strong>{{$client->name}}</strong>)</label>
                                                        <input type="text" name="client_id" class="form-control" id="client_id" value="{{$client->id}}">
                                                        @if($errors->has('client_id'))
                                                            <span class="help-block">{{ $errors->first('client_id')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    {{-- Patient's name --}}
                                                    <div class="form-group{{$errors->has('patient_name') ? ' has-error' : ''}}">
                                                        <label for="patient_name" class="control-label"><strong>Patient Name</strong></label>
                                                        <input type="text" name="patient_name" class="form-control" id="patient_name" value="{{old('patient_name') ?: ''}}">
                                                        @if($errors->has('patient_name'))
                                                            <span class="help-block">{{ $errors->first('patient_name')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    {{-- The casefile_id --}}
                                                    <div class="form-group{{$errors->has('casefile_id') ? ' has-error' : ''}}">
                                                        <label for="casefile_id" class="control-label"><strong>Casefile Id</strong></label>
                                                        <input type="text" name="casefile_id" class="form-control" id="casefile_id" value="#/{{$client->id}}/{{$randomHash}}">
                                                        @if($errors->has('casefile_id'))
                                                            <span class="help-block">{{ $errors->first('casefile_id')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    {{-- The Address --}}
                                                    <div class="form-group{{$errors->has('address') ? ' has-error' : ''}}">
                                                        <label for="city" class="control-label"><strong>Address</strong></label>
                                                        <textarea class="form-control" rows="5" name="address" id="address">{{ old('address') ?: ''}}</textarea>
                                                        @if($errors->has('address'))
                                                            <span class="help-block">{{$errors->first('address')}}</span>
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
                                                <div class="col-sm-7">
                                                    <div class="form-group{{$errors->has('contact') ? ' has-error' : ''}}">
                                                        <label for="contact" class="control-label"><strong>Contact Cell</strong></label>
                                                        <input type="phone" name="contact" class="form-control" id="contact" value="{{old('contact') ?: ''}}">
                                                        @if($errors->has('contact'))
                                                            <span class="help-block">{{$errors->first('contact')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group{{$errors->has('date_of_birth') ? ' has-error' : ''}}">
                                                        <label for="date_of_birth" class="control-label"><strong>Date of Birth</strong></label>
                                                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{old('date_of_birth') ?: ''}}">
                                                        @if($errors->has('date_of_birth'))
                                                            <span class="help-block">{{$errors->first('date_of_birth')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group{{$errors->has('sex') ? ' has-error' : ''}}">
                                                        <label for="sex" class="control-label"><strong>Sex</strong></label>
                                                        <select name="sex" class="form-control" id="sex" value="{{old('sex') ?: ''}}">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        @if($errors->has('sex'))
                                                            <span class="help-block">{{$errors->first('sex')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group{{$errors->has('marital_status') ? ' has-error' : ''}}">
                                                        <label for="marital_status" class="control-label"><strong>Marital Status</strong></label>
                                                        <select name="marital_status" class="form-control" id="marital_status" value="{{old('marital_status') ?: ''}}">
                                                            <option value="single">Single</option>
                                                            <option value="married">Married</option>
                                                            <option value="divorced">Divorced</option>
                                                            <option value="widowed">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group{{$errors->has('bloodgroup') ? ' has-error' : ''}}">
                                                        <label for="bloodgroup" class="control-label"><strong>Blood Group</strong></label>
                                                        <input type="text" name="bloodgroup" class="form-control" id="bloodgroup" value="{{old('bloodgroup') ?: ''}}">
                                                        @if($errors->has('bloodgroup'))
                                                            <span class="help-block">{{$errors->first('bloodgroup')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group{{$errors->has('genotype') ? ' has-error' : ''}}">
                                                        <label for="genotype" class="control-label"><strong>Genotype</strong></label>
                                                        <input type="text" name="genotype" class="form-control" id="genotype" value="{{old('genotype') ?: ''}}">
                                                        @if($errors->has('genotype'))
                                                            <span class="help-block">{{$errors->first('genotype')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="form-group{{$errors->has('employer') ? ' has-error' : ''}}">
                                                        <label for="employer" class="control-label"><strong>Employer</strong></label>
                                                        <input type="text" name="employer" class="form-control" id="employer" value="{{old('employer') ?: ''}}">
                                                        @if($errors->has('employer'))
                                                            <span class="help-block">{{$errors->first('employer')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group{{$errors->has('employer_contact') ? ' has-error' : ''}}">
                                                        <label for="employer_contact" class="control-label"><strong>Employer Contact</strong></label>
                                                        <input type="text" name="employer_contact" class="form-control" id="employer_contact" value="{{old('employer_contact') ?: ''}}">
                                                        @if($errors->has('employer_contact'))
                                                            <span class="help-block">{{$errors->first('employer_contact')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    {{-- Employer Babe --}}
                                                    <div class="form-group{{$errors->has('employer_address') ? ' has-error' : ''}}">
                                                        <label for="employer_address" class="control-label"><strong>Employer Address</strong></label>
                                                        <textarea class="form-control" rows="5" name="employer_address" id="employer_address">{{ old('employer_address') ?: ''}}</textarea>
                                                        @if($errors->has('employer_address'))
                                                            <span class="help-block">{{$errors->first('employer_address')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group{{$errors->has('emergency_contact') ? ' has-error' : ''}}">
                                                        <label for="emergency_contact" class="control-label"><strong>Emergency Contact</strong></label>
                                                        <input type="text" name="emergency_contact" class="form-control" id="emergency_contact" value="{{old('emergency_contact') ?: ''}}">
                                                        @if($errors->has('emergency_contact'))
                                                            <span class="help-block">{{$errors->first('emergency_contact')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group{{$errors->has('emergency_phone') ? ' has-error' : ''}}">
                                                        <label for="emergency_phone" class="control-label"><strong>Emergency Phone</strong></label>
                                                        <input type="text" name="emergency_phone" class="form-control" id="emergency_phone" value="{{old('emergency_phone') ?: ''}}">
                                                        @if($errors->has('emergency_phone'))
                                                            <span class="help-block">{{$errors->first('emergency_phone')}}</span>
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