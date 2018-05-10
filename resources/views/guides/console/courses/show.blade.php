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
                        <h1 class="page-header text-overflow">Quick Learn Management Console</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                </div>

                                
                <!--Fixedbar-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                
                <div class="page-fixedbar-container">
                    <div class="page-fixedbar-content">
                        <div class="nano">
                            <div class="nano-content">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            QLR Console 
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a class="list-group-item" href="/guide/console/">{{$course->coursename}} <span class="badge badge-primary">topics</span></a>
                                            <a class="list-group-item" href="/guide/console/course/{{$course->id}}/topics/newtopic">Add Topics</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="panel-footer">{{$today}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Fixedbar-->

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    @if($course)
                        <div class="row">
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
                                                    <a class="btn btn-xs btn-success" href="courses/{{$course->id}}/">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($topics)
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel pos-rel">
                                    <div class="">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Topics <span class="badge badge-primary">{{count($topics)}}</span></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="list-group">
                                                @foreach($topics as $topic)
                                                    <a href="topics/{{$topic->id}}" class="list-group-item">{{$topic->name}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
        </div>
    </div>
@endsection