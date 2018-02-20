@extends('client.layouts')

@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar">
        @include('client.partials.navbar')
        <div class="boxed">
            {{-- Content Container --}}
            <div id="content-container">
                

                @include('client.partials.pagehead')

                @include('client.partials.fixedbar')

                {{-- Page Content --}}
                <div id="page-content">
                    {{-- User Summary --}}
                    <div class="panel">
                        {{-- chart info --}}
                        <div class="panel-body">
                            <div class="row mar-top">
                                <div class="col-md-5">
                                    <h3 class="text-main text-normal text-2x mar-no">System Information</h3>
                                    <h5 class="text-uppercase text-muted text-normal">Report of System Activities</h5>
                                    <hr class="new-section-xs">
                                    <div class="row mar-top">
                                        <div class="col-sm-5">
                                            <div class="text-lg"><p class="text-5x text-thin text-main mar-no">{{count($client->users)}}</p></div>
                                            <p class="text-sm">Registered users as of initial client registration date.</p>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="list-group bg-trans mar-no">
                                                <a class="list-group-item" href="#"><i class="demo-pli-information icon-lg icon-fw"></i> User Details</a>
                                                <a class="list-group-item" href="#"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <a class="btn btn-pink mar-ver" href="/clientprofile">View Details</a>  

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Users Summary --}}

                    {{-- Row --}}
                    <div class="row">
                        <div class="col-lg-3">
                            {{-- Content Summary --}}
                            <div class="row">
                                <div class="col-sm-3 col-lg-6">
                                    <div class="panel panel-primary panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">53</span>
                                            <p>Casefiles</p>
                                            <i class="demo-pli-file-add icon-lg"></i>
                                        </div>
                                    </div>
                                    <div class="panel panel-warning panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">68</span>
                                            <p>Appointments</p>
                                            <i class="demo-psi-clock icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-6">
                                    <div class="panel panel-purple panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">32</span>
                                            <p>Staff</p>
                                            <i class="demo-pli-coding"></i>
                                        </div>
                                    </div>
                                    <div class="panel panel-dark panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">12</span>
                                            <p>Reports</p>
                                            <i class="demo-psi-receipt-4 icon-lg"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12">
                                    <div class="panel">
                                        <div class="panel-body text-center">
                                            <img alt="Profile Picture" class="img-lg img-circle mar-btm" src="img/profile-photos/5.png">
                                            <p class="text-lg text-semibold mar-no text-main">John Doe</p>
                                            <p class="text-muted">System Administrator </p>
                                            <div class="mar-top">
                                                <button class="btn btn-mint">Email</button>
                                                <button class="btn btn-mint">Call</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter mar-top">
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
                                                @else
                                                    <p class="lead">No Users Registered</p>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter mar-top">
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
                                                @else
                                                    <p class="lead">No Users Registered</p>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Row --}}
                </div>
                {{-- End Page Content --}}
            </div>
            {{-- End Content Container --}}

            @include('client.partials.mainnav')
        </div>

        @include('client.partials.footer')

    </div>
@endsection