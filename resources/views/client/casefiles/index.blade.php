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
                    <div class="row pad-btm">
                        <div class="col-sm-6 toolbar-left">
                            <button disabled="true" class="btn btn-default">Casefiles</button>
                            <a  id="demo-btn-addrow" class="btn btn-purple" href="/client/newcasefile">New Casefile</a>
                            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
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
                                                <p class="text-sm">Has {{$casefile->genotype}} with blood type {{$casefile->bloodgroup}}</p>
                                            </a>
                                            <div class="pad-top btn-groups">
                                                <a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i></a>
                                                <a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i></a>
                                                <a href="casefiles/{{$casefile->id}}"><i class="icon-lg icon-fw demo-pli-calendar-4"></i></a>
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

            @include('client.partials.mainnav')
        </div>

        @include('client.partials.footer')

    </div>
@stop