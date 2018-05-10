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
                                    <span class="pad-ver text-main text-sm text-uppercase text-bold">{{$birthcase->infant_details}}</span>
                                    <p class="text-sm">{{$today}}</p>
                                    <p class="text-2x text-main"></p>
                                    <a  id="demo-btn-addrow" class="btn btn-block btn-info mar-top" href="/client/birthcases/">Back</a>
                                </div>
                                <hr class="new-section-xs">
                                <div class="pad-hor">
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Birthcase Information</p>
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
                                <h4 class="text-main">Birthcase Summary</h4>
                                {{-- <p class="text-muted text-sm">No: </p> --}}
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-5" class="task-warning">
                                        <p class="text-bold text-main text-sm">File ID: {{$birthcase->infant_details}}</p>
                                        <p class="pad-btm bord-btm">Details: <br> <strong>{!! date_format(new DateTime($birthcase->date_of_birth), "d/M/Y") !!}</strong> | <strong>@if($birthcase->gender == "male") Male @else Female @endif</strong> </p>
                                        <hr>
                                        <p>Created at: <strong>{!! date_format(new DateTime($birthcase->created_at), "d/M/Y") !!} </strong></p>
                                        <hr>
                                        {{-- <form action="{{ route('client.vaccination.store', array('birthcase' => $birthcase->id,'client'=>$client->id)) }}" method="post" >
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="client_id" value="{{$client->id}}"/>
                                            <input type="hidden" name="infant_id" value="{{$birthcase->id}}">
                                            <button class="btn btn-primary btn-block" type="submit">Create Vaccination</button>
                                        </form>
                                         --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-information"> </i></a>
                                <h4 class="text-main">Add Vaccination</h4>
                                <hr>
                                @include('layouts.partials.alerts')
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-3" class="task-primary">
                                        <form action="{{route('birthcase.vaccinations.create',$birthcase->id)}}" class="form-horizontal" role="form" method="post">
                                            <div class=""></div>
                                            <div class="form-group{{$errors->has('vaccine') ? ' has-error' : ''}}">
                                                <label for="vaccine">Select Vaccination</label>
                                                <select name="vaccine" class="form-control" id="vaccine">
                                                    @if($vaccines)
                                                        @foreach($vaccines as $vaccine)
                                                            <option value="{{$vaccine->id}}">{{$vaccine->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group{{$errors->has('round') ? ' has-error' : ''}}">
                                                <label for="round">Vaccination Round</label>
                                                <select name="round" class="form-control" id="round">
                                                    <option value="#1">Round #1</option>
                                                    <option value="#2">Round #2</option>
                                                    <option value="#3">Round #3</option>
                                                    <option value="#4">Round #4</option>
                                                    <option value="#5">Round #5</option>
                                                </select>
                                            </div>

                                            <div class="form-group{{ $errors->has('months') ? ' has-error' : ''}}">
                                                <input type="text" name="months" class="form-control" id="months" value="{{ old('months') ?: '' }}" placeholder="Months">
                                                @if($errors->has('months'))
                                                    <span class="help-block">{{ $errors->first('months') }}</span>
                                                @endif
                                            </div>
                                            <input type="hidden" name="birthday" value="{{$birthcase->date_of_birth}}">
                                            <div class="form-group{{$errors->has('status') ? ' has-error' : ''}}">
                                                <label for="status">Vaccination Status</label>
                                                <select name="status" class="form-control" id="status">
                                                    <option value="pending">Pending</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <a href="#" class="pull-right btn btn-info btn-sm"><i class="demo-pli-information"></i></a>
                                <h4 class="text-main">Vaccinations <span class="badge badge-primary">{{count($vaccinationdetails)}}</span> </h4>
                                <hr>
                                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                    <li id="demo-tasklist-2" class="task-info">
                                        <a href="{{$birthcase->id}}/report" class="btn btn-block btn-primary">View Vaccination Report</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 table">
                            <table class="table table-stripped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vaccine</th>
                                        <th>Round</th>
                                        <th>Months</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($vaccinationdetails))
                                        @foreach($vaccinationdetails as $detail)
                                            <tr>
                                                <td>{{$detail->vaccine->name}}</td>
                                                <td>{{$detail->round}}</td>
                                                <td>@if($detail->months == 0) At Birth @else {{$detail->months}} @endif</td>
                                                <td>{!! date_format(new DateTime($detail->due_date), "d M, Y") !!}</td>
                                                <td>@if($detail->status == 'pending') <span class="badge badge-danger"> {{$detail->status}}</span> @else <span class="badge badge-success">{{$detail->status}}</span> @endif</td>
                                                <td><a href=""><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
