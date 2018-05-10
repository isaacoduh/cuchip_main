@extends('layouts.app')
@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar">
        @include('layouts.partials.navbar')
        <div class="boxed">
            {{-- Content Container --}}
            <div id="content-container">
                
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Dashboard</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                    <div class="text-center pad-btm">
                            <h3>Casefile No: <a href="#" class="btn-link text-thin">{{$casefile->casefile_id}}</a></h3>
                            <p>These casefile for the patient <strong>{{$casefile->patient_name}}</strong></p>
                        </div>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                
                {{-- Fixed bar --}}
                <div class="page-fixedbar-container">
                    <div class="page-fixedbar-content">
                        <div class="nano">
                            <div class="nano-content">

                                <div class="pad-all">
                                    <span class="pad-ver text-main text-sm text-uppercase text-bold">{{$casefile->patient_name}}</span>
                                    <p class="text-sm">{{$today}}</p>
                                    <p class="text-2x text-main"></p>
                                    <a  id="demo-btn-addrow" class="btn btn-block btn-info mar-top" href="/casefiles/{{$user->client_id}}">Back</a>
                                </div>
                                <hr class="new-section-xs">
                                <div class="pad-hor">
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Patient Information</p>
                                    <p>This app is a property of <strong class="text-main">Covenant University</strong>. It is a community initiative to help local health enterprises to reach higher efficiency levels.</p>
                                </div>


                                <hr class="new-section-xs">

                                <p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

                                <!--Simple Menu-->
                                <div class="list-group bg-trans">
                                    <a href="#" class="list-group-item"><i class="demo-pli-pencil icon-lg icon-fw"></i> Edit</a>
                                    <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Details</a>
                                    <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Delete</a>
                                </div>

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End fixed bar --}}

                {{-- Page Content --}}
                <div id="page-content">
                   {{--  <div class="row pad-btm">
                        <div class="col-sm-6 toolbar-left">
                            <button disabled="true" class="btn btn-default">Casefiles</button>
                            <a  id="demo-btn-addrow" class="btn btn-purple" href="{{url('casefiles/create')}}">New Casefile</a>
                            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        </div>
                    </div> --}}

                    <hr class="new-section-md bord-no">
                    <div class="row">
                        <div class="col-sm-4">
                            <div>
                                <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-information"> </i></a>
                                <h4 class="text-main">Casefile Summary</h4>
                                {{-- <p class="text-muted text-sm">No: </p> --}}
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-5" class="task-warning">
                                        <p class="text-bold text-main text-sm">File ID: {{$casefile->casefile_id}}</p>
                                        <p class="pad-btm bord-btm">Details: <br> <strong>{!! date_format(new DateTime($casefile->date_of_birth), "d/M/Y") !!}</strong> | <strong>{{$casefile->bloodgroup}}</strong> | <strong>{{$casefile->genotype}}</strong> | <strong>@if($casefile->sex == "m") Male @else Female @endif</strong> </p>
                                        <hr>
                                        <p>Birth Date: </p>
                                        <p>Created at: <strong>{!! date_format(new DateTime($casefile->registration_date), "d/M/Y") !!} </strong></p>
                                        <p>Prescriptions: <strong>2</strong></p>
                                        <p>Appointments: <strong>3</strong></p>
                                        <p>Admissions: <strong>2</strong></p>
                                        <p>Attachments: <strong>5</strong></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('prescriptions.form')
                        @include('files.form')
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <a href="#" class="pull-right btn-info btn-sm"><i class="demo-pli-pencil"> </i></a>
                                <h4 class="text-main">Appointments:</h4>
                                <p class="text-muted text-sm"></p>
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-2" class="task-info">
                                        <p class="text-bold">Appointments</p>
                                        <hr>
                                        @if($appointments)
                                            @foreach($appointments as $appointment)
                                                <div>
                                                    <div><i class="fa fa-check-square-o"></i> <p>Preferred Date: </p> <span>{!! date_format(new DateTime($appointment->preferred_date), "D-m-Y") !!}</span></div>
                                                    <div><i class="fa fa-check-square-o"></i> <span>{{ $appointment->description}}</span></div>
                                                    <a href="/casefiles/{{ $casefile->id }}/appointments/{{ $appointment->id }}/edit">Edit</a>
                                                    <button class="btn btn-danger delete pull-right" data-action="/casefiles/{{ $casefile->id }}/appointments/{{ $appointment->id }}" data-token="{{ csrf_token()}}"><i class="fa fa-trash-o"></i> Delete</button>  
                                                </div>
                                                <hr/>
                                            @endforeach
                                        @else
                                            <p>There are no appointments for this patient</p>
                                        @endif
                                        <form action="{{ route('casefiles.appointments.create',$casefile->id) }}" class="form-group" role="form" method="post">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                                <input type="text" name="name" class="form-control" id="name"  value="{{$casefile->patient_name}}" >
                                                @if($errors->has('name'))
                                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description of Appointment">{{ old('description') }}</textarea>
                                                @if($errors->has('notes'))
                                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('preferred_date') ? ' has-error' : '' }}">
                                                <label for="preferred_date">Preferred Date: </label>
                                                <input type="date" name="preferred_date" class="form-control" id="preferred_date">
                                                @if($errors->has('date'))
                                                    <span class="help-block">{{ $errors->first('preferred_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info"><span class="fa fa-plus"> Setup Appointment</span></button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-pencil "> </i></a>
                                <h4 class="text-main">Admissions</h4>
                                <p class="text-muted text-sm"></p>
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-2" class="task-info">
                                        <p class="text-bold">Admissions</p>
                                        <hr>
                                        @if($admissions)
                                            @foreach($admissions as $admission)
                                                <div><i class="fa fa-check-square-o"></i> Admitted: <span>{!! date_format(new DateTime($admission->admitted), "D-m-y")!!}</span></div>
                                                <div><i class="fa fa-check-square-o"></i>
                                                    @if($admission->status == 'admitted')
                                                        <p>Status: </p><span class="label label-success">{!! $admission->status !!}</span>
                                                    @else
                                                        <p>Status: </p><span class="label label-danger">{!! $admission->status !!}</span>
                                                    @endif
                                                </div>
                                                <button class="btn btn-danger discharge pull-right" data-action="/casefiles/{{ $casefile->id }}/admissions/{{ $admission->id }}" data-token="{{ csrf_token()}}"><i class="fa "></i> Discharge</button>
                                                <hr/>
                                            @endforeach
                                        @endif
                                        <form action="{{ route('casefiles.admissions.create',$casefile->id) }}" class="form-group" role="form" method="post">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                                <label for="name">Patient Name on File</label>
                                                <input type="text" name="name" class="form-control" id="name" value="{!! $casefile->patient_name !!}">
                                                @if($errors->has('name'))
                                                    <span class="help-block">{{$errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('admitted') ? ' has-error' : '' }}">
                                                <label for="admitted">Date of Admission</label>
                                                <input type="date" id="admitted" name="admitted" class="form-control">
                                                @if($errors->has('admitted'))
                                                    <span class="help-block">{{$errors->first('admitted')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                                <label for="status">Admission Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Set Status</option>
                                                    <option value="admitted">Admitted</option>
                                                    <option value="discharged">Discharged</option>
                                                </select>
                                                @if($errors->has('status'))
                                                    <span class="help-block">{{ $errors->first('status')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info"><span class="fa fa-plus"> Setup Admission</span></button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div>
                                <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-pencil "> </i></a>
                                <h4 class="text-main">Comments</h4>
                                <p class="text-muted text-sm"></p>
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-5" class="task=warning">
                                        <p>Comments/Notes:</p>
                                        <hr>
                                        @if($comments)
                                            @foreach( $comments as $comment)
                                                    <div>
                                                        <div><i class="fa fa-check-square-o"></i>
                                                        <span>{{ $comment->comments }} by
                                                        <span style="font-style: italic;color: #09f;">
                                                            {{$comment->user()->first()->name }}
                                                        </span>
                                                        </span></div>
                                                        <a href="/casefiles/{{ $casefile->id }}/comments/{{ $comment->id }}/edit">Edit</a>
                                                        <button class="btn btn-danger delete pull-right"
                                                        data-action="/casefiles/{{ $casefile->id }}/comments/{{ $comment->id }}"
                                                        data-token="{{csrf_token()}}">
                                                        <i class="fa fa-trash-o"></i>Delete
                                                        </button>
                                                    </div>
                                                    <hr/>
                                            @endforeach
                                        @endif 
                                        <form action="{{ route('casefiles.comments.create', $casefile->id) }}" class="form-vertical" role="form" method="post">
                                            <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                                                <textarea name="comments" class="form-control" style="width:80%;" id="comment" rows="5" cols="5"></textarea>
                                                @if ($errors->has('comments'))
                                                    <span class="help-block">{{ $errors->first('comments') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info">Add Comment</button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Page Content --}}
            </div>
            {{-- End Content Container --}}

            {{-- @include('layouts.partials.mainnav') --}}
        </div>

        @include('layouts.partials.footer')

    </div>
@stop