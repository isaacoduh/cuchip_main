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
                            <button disabled="true" class="btn btn-default">BirthCases</button>
                            <a  id="demo-btn-addrow" class="btn btn-purple" href="/client/birthcase/new">New Birthcase</a>
                            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
                        </div>
                    </div>

                    @if($birthcases)
                        <div class="row">
                            @foreach($birthcases as $birthcase)
                                <div class="col-sm-4 col-md-3">
                                    <div class="panel pos-rel">
                                        <div class="pad-all text-center">
                                            
                                            <a href="#">
                                                @if($birthcase->sex == "male")
                                                    <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/1.png')}}">
                                                @else
                                                    <img alt="Profile Picture" class="img-lg img-circle mar-ver" src="{{asset('img/profile-photos/8.png')}}">
                                                @endif
                                                <p class="text-lg text-semibold mar-no text-main">{{$birthcase->infant_details}}</p>
                                            </a>
                                            <div class="pad-top btn-groups">
                                                <a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i></a>
                                                <a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i></a>
                                                <a href="birthcases/{{$birthcase->id}}"><i class="icon-lg icon-fw demo-pli-calendar-4"></i></a>
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