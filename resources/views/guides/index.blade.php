@extends('layouts.app')
@section('content')
	<div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar">
		<!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{asset('img/logo.png')}}" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Quick Learn by CuChip</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Search-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Search-->

                    </ul>
                    <ul class="nav navbar-top-links">


                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->



                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->

                        <li>
                            <a href="#" class="aside-toggle">
                                <i class="demo-pli-dot-vertical"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">
        	<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Quick Learn Reference by CUCHIP</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li class="active">Welcome to quick learn</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                                
                <!--Fixedbar-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                
                <div class="page-fixedbar-container">
                    <div class="page-fixedbar-content">
                        <div class="nano">
                            <div class="nano-content">

                                <div class="pad-all">
                                    <span class="pad-ver text-main text-sm text-uppercase text-bold">Learning Board</span>
                                    <p class="text-sm"><strong>{!! date_format(new DateTime($today), "M d, Y") !!}</strong></p>
                                    <p class="text-2x text-main"></p>
                                    
                                    <a href="/guidehome" class="btn btn-block btn-info mar-top">Home</a>
                                </div>
                                <hr class="new-section-xs">
                                <div class="pad-hor">
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">App Information</p>
                                    <p>This app is a property of <strong class="text-main">Covenant University</strong>. It is a community initiative to help local health enterprises to reach higher efficiency levels.</p>
                                    <p>The quick learn tool is a means by which local health workers can access health information on various kinds of diseases and scenarios. Please feel free to contact the app providers to curate more topics and guides.</p>
                                </div>


                                <hr class="new-section-xs">

                                <p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

                                
                                

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Fixedbar-->

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                	@if($courses)
                		<div class="row">
                			@foreach($courses as $course)
                				<div class="col-sm-4 col-md-4">
                					<div class="panel pos-rel">
                						<div class="">
                							<div class="panel-heading">
                								<h3 class="panel-title">
                									{{$course->coursename}}
                								</h3>
                							</div>
                							<div class="panel-body">
                								<h4>Description</h4>
                								<p>{{$course->description}}</p>
                							</div>
                							<div class="panel-footer">
                								<div class="blog-footer">
                									<div class="media-left">
                										<a class="btn btn-xs btn-success" href="guide/courses/{{$course->id}}/">Explore</a>
                									</div>
                								</div>
                							</div>
                						</div>
                					</div>
                				</div>
                			@endforeach
                		</div>
                	@endif
                    <hr class="new-section-sm bord-no">
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
        </div>
	</div>
	
@endsection