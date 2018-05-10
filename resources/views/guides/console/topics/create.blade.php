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
                                            <a class="list-group-item" href="/guide/console/">{{$course->coursename}} </a>
                                            
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
                    <div class="panel">
                        <div class="panel-body">
                            <div class="fixed-fluid">
                                <div class="fluid">
                                    <div class="text-right">
                                        <a href="/guide/console/courses/{{$course->id}}/" class="btn btn-sm btn-primary">Back</a>
                                        
                                    </div>

                                    <hr class="new-section-md bord-no">
                                    <div class="">
                                        <h4 >New Topic</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <form action="{{ route('guide.topic.store',$course->id) }}" class="form-vertical" role="form" method="post">
                                            
                                        {!! csrf_field() !!} 
                                        <div class="row">
                                            <div class="col-sm-9">
                                                {{-- Course Title --}}
                                                <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
                                                    <label for="name" class="control-label"><strong>Topic</strong></label>
                                                    <input type="text" name="name" class="form-control" id="name" value="{{old('name') ?: ''}}">
                                                    @if($errors->has('name'))
                                                        <span class="help-block">{{ $errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                {{-- Description --}}
                                                <div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
                                                    <label for="city" class="control-label"><strong>Description</strong></label>
                                                    <textarea class="form-control" rows="5" name="description" id="description">{{ old('description') ?: ''}}</textarea>
                                                    @if($errors->has('description'))
                                                        <span class="help-block">{{$errors->first('description')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel-footer text-right">
                                            <button class="btn btn-primary " type="submit">Add</button>
                                        </div>
                                        {{-- <input type="hidden" name="_token" value="{{ Session::token() }}"> --}}
                                    </form>
                                </div>
                                <hr class="new-section-sm bord-no">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
        </div>
    </div>
@endsection
