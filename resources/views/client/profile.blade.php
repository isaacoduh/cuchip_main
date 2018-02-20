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
                                            <a href="client/user/create" class="btn btn-sm btn-primary">Create User Account</a>
                                            <!-- <button class="btn btn-sm btn-primary">Send Message</button>
                                            <button class="btn btn-sm btn-success">Download CV</button> -->
                                        </div>
                    
                                        <hr class="new-section-md bord-no">

                                        <h3>Users Summary</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-vcenter mar-top table-stripped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="min-w-td">#</th>
                                                                        <th class="min-w-td">Case</th>
                                                                        <th>Full Name</th>
                                                                        <th>Email</th>
                                                                        <th>Status</th>
                                                                        <th class="text-center">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(count($users))
						                                                @foreach($users as $row)
						                                                    <tr>
						                                                        <td>{{$row->name}}</td>
						                                                        <td>{{$row->role}}</td>
						                                                        <td>{{$row->email}}</td>
						                                                        <td class="text-center">
						                                                        <div class="btn-group">
						                                                            <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
						                                                            <a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip" href="#" data-original-title="Delete" data-container="body"></a>
						                                                            <a class="btn btn-sm btn-default btn-hover-warning demo-pli-unlock add-tooltip" href="#" data-original-title="Ban user" data-container="body"></a>
						                                                        </div>
						                                                    </td>
						                                                    </tr>

						                                                @endforeach
						                                                {{$users->links()}}
						                                            @else
						                                                <p class="lead">No Users Registered</p>
						                                            @endif
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h3>Casefiles</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-vcenter mar-top table-stripped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="min-w-td">#</th>
                                                                        <th class="min-w-td">Case</th>
                                                                        <th>Full Name</th>
                                                                        <th>Email</th>
                                                                        <th>Role</th>
                                                                        <th class="text-center">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                        
                                                            <!--Pagination-->
                                                            <div class="text-right">
                                                                <ul class="pagination mar-no">
                                                                    <li class="disabled"><a class="demo-pli-arrow-left-2" href="#"></a></li>
                                                                    <li class="active"><a href="#">1</a></li>
                                                                    <li><a href="#">2</a></li>
                                                                    <li><a href="#">3</a></li>
                                                                    <li><a href="#">4</a></li>
                                                                    <li><span>...</span></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a class="demo-pli-arrow-right-2" href="#"></a></li>
                                                                </ul>
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