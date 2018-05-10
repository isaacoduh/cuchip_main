@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <a href="/logout">Logout</a>

                    {{$user->client_id}}
                    @if($casefiles)
                        <a href="casefiles/{{$user->client_id}}">Casefiles</a>
                    @endif
                    

                    
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
        <div class="boxed">
            <div id="content-container">
                {{-- Fixed bar --}}
                {{-- page content --}}

                <div id="page-content">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="fixed-fluid">
                                <div class="fixed-md-200 pull-sm-left fixed-right-border">
                                    {{-- Simple Profile --}}
                                    <div class="text-center">
                                        <div class="pad-ver">
                                            @if($user->gender == "male")
                                                <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/1.png')}}">
                                            @else
                                                <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/8.png')}}">
                                            @endif
                                        </div>
                                        <h4 class="text-lg text-overflow mar-no">{{$user->name}}</h4>
                                        <p class="text-sm text-muted">{{$user->email}}</p>
                
                                        <div class="pad-ver btn-groups">
                                            <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                                            <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                                            <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
                                            <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                                        </div>
                                        <a href="/logout" class="btn btn-block btn-success btn-lg">Logout</a>
                                        <hr>
                                        
                                    </div>
                                    <!-- Profile Details -->
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">About</p>
                                    <p><i class="glyphicon glyphicon-user icon-lg icon-fw"></i> {{$user->name}}</p>
                                    <p><i class="demo-pli-information icon-lg icon-fw"></i> {{$user->bio}}</p>
                                    <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> {{$user->client->address}}</p>
                                    <p><a href="#" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> http://cuchip.herokuapp.com</a></p>
                                    <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>{{$user->client->contact}}</p>
                                    <p><i class="demo-pli-mail icon-lg icon-fw"></i> {{$user->email}}</p>
                
                                    <hr>
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Client Summary</p>
                                    <ul class="list-inline">
                                        <li class="tag tag-sm">Casefiles <span class="badge">{{count($user->client->casefiles)}}</span></li>
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
                                        <button class="btn btn-sm btn-primary">Edit Profile</button>
                                        <!-- <button class="btn btn-sm btn-primary">Send Message</button>
                                        <button class="btn btn-sm btn-success">Download CV</button> -->
                                    </div>
                                    <hr class="new-section-md bord-no">
                                    <h3>Welcome,</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4 ">
                                            <div class="panel panel-primary panel-colorful">
                                                <div class="pad-all text-center">
                                                    <span class="text-3x text-thin">{{count($user->client->casefiles)}}</span>
                                                    <p class="text-2x">Casefiles</p>
                                                   
                                                    <br>
                                                    <a href="casefiles/{{$user->client_id}}" class="btn  btn-block btn-lg btn-rounded btn-default">View</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr class="new-section-md bord-no">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
