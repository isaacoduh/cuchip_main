@extends('layouts.app')
@section('content')
	{{-- @include('layouts.partials.alerts') --}}
	<div class="container" style="margin-top: 30px;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">Vaccines </h4> 
			</div>
			<div class="panel-body">
				<table class="table table-hover table-bordered">
					<a href="{{route('vaccines.create')}}" class="btn btn-sm btn-success ">Add</a>
					<br>
					<br>
					<thead>
						<tr>
							<th>Vaccine</th>
							<th>Description</th> 
							<th>Dosage</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@if($vaccines)
							@foreach($vaccines as $vaccine)
								<tr>
									<td>{{$vaccine->name}}</td>
									<td>{{$vaccine->description}}</td>
									<td>{{$vaccine->dosage}}</td>
									<td><a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
@endsection