@extends('layouts.app');
@section('content')
	<section>
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Add Vaccine</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal " method="post" action="{{route('vaccines.store')}}">
						<div class="form-group{{$errors->has('name') ? ' has-error':''}}">
							<label for="name" class=" col-sm-4">Vaccine Name</label>
							<input type="text" name="name" class="form-control col-sm-8" id="name" value="{{ old('name') ?: '' }}" />
							@if($errors->has('name'))
								<span class="help-block">{{$errors->first('name')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
							<label for="description" class="col-sm-4">Description</label>
							<textarea class="form-control" name="description" rows="7" id="description" >{{old('description')}}</textarea>
							@if($errors->has('description'))
								<span class="help-block">{{$errors->first('description')}}</span>
							@endif
						</div>
						<div class="form-group{{$errors->has('dosage') ? ' has-error' : ''}}">
							<label for="dosage" class="col-sm-4">Vaccination Dosages</label>
							<input type="text" name="dosage" class="form-control col-sm-8" id="dosage" value="{{old('dosage') ?: ''}}" />
							@if($errors->has('dosage'))
								<span class="help-block">{{$errors->first('dosage')}}</span>
							@endif
						</div>

						<div class="form-group">
	                        <button type="submit" class="btn btn-info"><span class="fa fa-plus"> Add Vaccine</span></button>
	                    </div>
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
				<div class="panel-footer">
					<h5 class="panel-title">CUCHIP</h5>
				</div>
			</div>
		</div>
	</section>
@endsection