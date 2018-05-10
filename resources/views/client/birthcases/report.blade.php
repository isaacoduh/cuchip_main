@extends('layouts.app')
@section('content')
	<div id="container" class="effect aside-float aside-bright mainnav-sm page-fixedbar page-fixedbar-right">
		@include('client.partials.navbar')
		<div class="boxed">
			<div id="content-container">
				<div id="page-content">
					<div class="panel">
						<div class="panel-body">
							<div class="invoice-masthead">
								<div class="invoice-text">
									<h3 class="h1 text-uppercase text-thin mar-no text-primary">VACCINATION REPORT</h3>
								</div>
								<div class="invoice-brand" style="white-space: nowrap;">
									<div class="invoice-logo">
										<h4 class="navbar-brand">CUCHIP</h4>
									</div>
								</div>
							</div>
							<div class="invoice-bill row">
								<div class="col-sm-6 text-xs-center">
									<strong class="text-main">{{$birthcase->infant_details}}</strong><br>
									Address: <p>{{$birthcase->parents_address}}, {{$birthcase->city}}, {{$birthcase->state}} state, Nigeria</p>
									Parents:<p>{{$birthcase->parents_info}}</p>
									Contact:<p>{{$birthcase->phone}}</p>									
								</div>
								<div class="col-sm-6 text-xs-center">
									<table class="invoice-details">
										<tbody>
											<tr>
												<td class="text-main text-bold">Vaccination #</td>
												<td class=" text-info text-bold">VAC-{{$birthcase->client_id}}-{{$birthcase->id}}</td>
											</tr>
											<tr>
					                            <td class="text-main text-bold">Vaccination Status</td>
					                            <td class="text-right"><span class="badge badge-success">Ongoing</span></td>
					                        </tr>
					                        <tr>
					                            <td class="text-main text-bold">Start Date: </td>
					                            <td class="text-right">{!! date_format(new DateTime($birthcase->date_of_birth), "d M, Y")!!}</td>
					                        </tr>
										</tbody>
									</table>
								</div>
								<hr class="new-section-sm bord-no">
								<div class="row">
									<div class="col-lg-12 table-responsive">
										<table class="table table-bordered invoice-primary">
											<thead>
												<tr class="bg-trans-dark">
													<th class="text-uppercase">Vaccine</th>
			                                        <th class="min-col text-center text-uppercase">Round</th>
			                                        <th class="min-col text-center text-uppercase">Months</th>
			                                        <th class="min-col text-center text-uppercase">Due Date</th>
			                                        <th class="min-col text-center text-uppercase">Status</th>
			                                        <th class="min-col text-center text-uppercase">Action</th>
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
									<!-- Health Worker Information -->
						        <div class="clearfix">
						        
						        </div>
						
						        <div class="text-right no-print">
						            <a href="javascript:window.print()" class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></a>
						            <a href="/client/birthcases/{{$birthcase->id}}" class="btn btn-primary" >Back</a>
						        </div>
						
						        <hr class="new-section-sm bord-no">
						
						        <div class="well well-sm">
						            <p class="text-bold text-main text-uppercase">Notes &amp; Information</p>
						            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
						            <p>If you have any questions concerning this schedule, please contact the head staff at <strong class="text-main">Community Health Center</strong></p>
						        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection