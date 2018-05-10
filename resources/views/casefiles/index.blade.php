@extends('layouts.app')
@section('content')
    <div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar">
        @include('layouts.partials.navbar')
        <div class="boxed">
            {{-- Content Container --}}
            <div id="content-container">
                

                @include('layouts.partials.pagehead')

                @include('layouts.partials.fixedbar')

                {{-- Page Content --}}
                <div id="page-content">
                    <div class="row pad-btm">
                        <div class="col-sm-6 toolbar-left">
                            <button disabled="true" class="btn btn-default">Casefiles</button>
                            {{-- <a  id="demo-btn-addrow" class="btn btn-purple" href="{{url('casefiles/create')}}">New Casefile</a> --}}
                            {{-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> --}}
                        </div>
                    </div>

                    @if($casefiles)
                        <div class="row">
                            @foreach($casefiles as $casefile)
                                <div class="col-sm-4 col-md-3">
                                    <div class="panel pos-rel">
                                        <div class="pad-all text-center">
                                            
                                            <a href="#">
                                                @if($casefile->sex == "male")
                                                    <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/1.png')}}">
                                                @else
                                                    <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/8.png')}}">
                                                @endif
                                                <p class="text-lg text-semibold mar-no text-main">{{$casefile->patient_name}}</p>
                                                <p class="text-sm"><strong>{{$casefile->casefile_id}}</strong></p>
                                                <p class="text-sm">Has {{$casefile->genotype}} genotype with blood type {{$casefile->bloodgroup}}</p>
                                            </a>
                                            <div class="pad-top btn-groups">
                                                <a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i></a>
                                                <a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i></a>
                                                {{-- <a href="/casefiles/{{$client->id}}/casefile/{{$casefile->id}}"><i class="icon-lg icon-fw demo-pli-calendar-4"></i></a> --}}
                                                <a href="/casefile/{{$casefile->id}}"><i class="icon-lg icon-fw demo-pli-calendar-4"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                {{-- End Page Content --}}
            </div>
            {{-- End Content Container --}}

            @include('layouts.partials.mainnav')
        </div>

        @include('layouts.partials.footer')

    </div>
@stop