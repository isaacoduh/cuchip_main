@extends('layouts.app')

@section('content')

    <div class="col-sm-9 col-md-10 main">
        <h1>Edit Prescription</h1>
        @include('layouts.partials.alerts')
        <a href="/casefile/{{$casefileId}}">Back</a>
        <div class="col-lg-6">
            <form action="{{ url('casefile/' .$casefileId .'/prescriptions/' . $prescription->id) }}" class="form-group" role="form" method="post">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                    <input type="text" name="name" class="form-control" id="name" value="{!! $prescription->name !!}" >
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('dosage') ? ' has-error' : ''}}">
                    <input type="text" name="dosage" class="form-control" id="dosage" value="{!! $prescription->dosage !!}" >
                    @if($errors->has('dosage'))
                        <span class="help-block">{{ $errors->first('dosage') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('notes') ? ' has-error' : ''}}">
                    <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{!! $prescription->notes !!}</textarea>
                    @if($errors->has('notes'))
                        <span class="help-block">{{ $errors->first('notes') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info"><span class="fa fa-plus"> Update Prescription</span></button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! method_field('PUT') !!}
            </form>
        </div>
    </div>

@stop