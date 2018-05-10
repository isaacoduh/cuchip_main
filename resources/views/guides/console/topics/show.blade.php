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
                                        <hr>
                                        <div class="list-group">
                                            <h4 href="">{{$topic->name}}</h4>
                                            <p>{{$topic->description}}</p>
                                        </div>
                                        <hr>
                                        <div class="list-group">
                                            <button data-target="#modal-notes" data-toggle="modal" class="btn btn-primary btn-block">Add Notes</button>
                                            <br>
                                            <button data-target="#modal-materials" data-toggle="modal" class="btn btn-primary btn-block">Add Materials</button>
                                        </div>
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

<!--Default Bootstrap Modal-->
<!--===================================================-->
<div class="modal fade" id="modal-notes" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('guide.note.store',array('course' =>$course->id ,'topic' => $topic->id )) }}" class="form-vertical" role="form" method="post">
                {!! csrf_field() !!}

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Add Notes</h4> 
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-9">
                            {{-- Course Title --}}
                            <div class="form-group{{$errors->has('subheading') ? ' has-error' : ''}}">
                                <label for="subheading" class="control-label"><strong>Sub Heading</strong></label>
                                <input type="text" name="subheading" class="form-control" id="subheading" value="{{old('subheading') ?: ''}}">
                                @if($errors->has('subheading'))
                                    <span class="help-block">{{ $errors->first('subheading')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            {{-- Description --}}
                            <div class="form-group{{$errors->has('note') ? ' has-error' : ''}}">
                                <label for="note" class="control-label"><strong>Note</strong></label>
                                <textarea class="form-control" rows="5" name="note" id="note">{{ old('note') ?: ''}}</textarea>
                                @if($errors->has('note'))
                                    <span class="help-block">{{$errors->first('note')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary " type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->


<!--Default Bootstrap Modal for Materials-->
<!--===================================================-->
<div class="modal fade" id="modal-materials" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('guide.material.store',array('course' =>$course->id ,'topic' => $topic->id )) }}" class="form-vertical" role="form" method="post">
                {!! csrf_field() !!}

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Add Material</h4> 
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-9">
                            {{-- Material Type --}}
                            <div class="form-group{{$errors->has('type') ? ' has-error' : ''}}">
                                <label for="type" class="control-label"><strong>Material Type</strong></label>
                                <select class="form-control" name="type">
                                    <option value="">Material Type</option>
                                    <option value="references">References</option>
                                    <option value="slideshow">Slideshow</option>
                                    <option value="quizzes">Quizzes</option>
                                    <option value="video">Video Link</option>
                                </select>
                                
                                @if($errors->has('type'))
                                    <span class="help-block">{{ $errors->first('type')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            {{-- Description --}}
                            <div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
                                <label for="description" class="control-label"><strong>Description</strong></label>
                                <textarea class="form-control" rows="5" name="description" id="description">{{ old('description') ?: ''}}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            {{-- Description --}}
                            <div class="form-group{{$errors->has('material') ? ' has-error' : ''}}">
                                <label for="material" class="control-label"><strong>Material</strong></label>
                                <textarea class="form-control" rows="5" name="material" id="material">{{ old('material') ?: ''}}</textarea>
                                @if($errors->has('material'))
                                    <span class="help-block">{{$errors->first('material')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary " type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Bootstrap Modal-->