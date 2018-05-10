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
                            <span class="brand-text">Quick Learn Reference Tool  by CuChip</span>
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
                                            QLR Tool
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a class="list-group-item" href="/guide/courses/">{{$course->coursename}} </a>
                                        </div>
                                        <hr>
                                        <div class="list-group">
                                            <h4 href="">{{$topic->name}}</h4>
                                            <p>{{$topic->description}}</p>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                    <hr>
                                    <div class="panel-footer">{{$today}}</div>
                                    <hr>


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
                    {{-- Notes --}}
                    <div class="panel">
                        <div class="pad-all file-manager">
                            <div class="fixed-fluid">
                                <div class="fluid file-panel">
                                    <div class="bord-btm pad-ver">
                                        <ol class="breadcrumb">
                                            <li><a href="#">{{$course->coursename}}</a></li>
                                            <li><a href="#">{{$topic->name}}</a></li>
                                            <li class="active">Notes &amp; Materials</li>
                                        </ol>
                                    </div>
                                    <div class="file-toolbar bord-btm">
                                        <div class="btn-file-toolbar">
                                            <a class="btn btn-icon add-tooltip" href="#" data-original-title="Edit File" data-toggle="tooltip"><i class="icon-2x demo-pli-file-edit"></i></a>
                                        </div>
                                    </div>
                                    @if($notes)
                                       @foreach($notes as $note)
                                            <h3 class=""><strong>{{$note->subheading}}</strong></h3>
                                            <p>{{$note->note}}</p>
                                            <br>
                                       @endforeach
                                    @endif

                                    <hr>
                                    <div class="file-toolbar bord-btm">
                                        <div class="btn-file-toolbar">
                                            <a class="btn btn-icon add-tooltip" href="#" data-original-title="New Folder" data-toggle="tooltip"><i class="icon-2x demo-pli-folder"></i></a>
                                        </div>
                                    </div>
                                    @if($materials)
                                       @foreach($materials as $material)

                                            <h5 class=""><strong>{{$material->description}}</strong> | {{$material->type}}</h5>
                                            <p>{{$material->material}}</p>
                                            <br>
                                       @endforeach
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- @if($course)
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
                    @endif --}}
                    {{-- @if($topics)
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
                    @endif --}}
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
        </div>
    </div>
@endsection



