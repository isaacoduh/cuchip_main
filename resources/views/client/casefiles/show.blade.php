@extends('client.layouts')
@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar">
        @include('client.partials.navbar')
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
                                    <a  id="demo-btn-addrow" class="btn btn-block btn-info mar-top" href="/client/casefiles/">Back</a>
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
                    </div>
                    
                </div>
                {{-- End Page Content --}}
            </div>
            {{-- End Content Container --}}

            {{-- @include('client.partials.mainnav') --}}
        </div>

        @include('client.partials.footer')

    </div>
@stop