@extends('app')
@section('content')
<main id="main" class="main">
<!-- Main content -->
	<section class="section">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Doctor profile</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
							{{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}
									<a href="{{route('doctor.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add doctor </a>
							{{-- @endif	 --}}
									<a href="{{route('doctor.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Doctor List</a>
									
									<a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
									
								</div>
							</div>
							 <div class="panel-body">
								<div style="text-align:center;margin-top:30px;">
									<p style="font-size: 36px;font-weight:bold;color:#207fdd">Doctor Information</p>
									<center style="margin-top: 50px;margin-bottom:50px;">
									
										<table>
											<tr>
												<td style="padding-right: 100px;">
													<table>
														<tr>
															<td>
																@if($doctor->employee->picture == '')
																	<i class="fa fa-user-md" style="font-size:150px;"></i>
																@else
																	<img src="{{ asset('uploads/employee/'.$doctor->employee->picture) }}" alt="no image" width="250" height="300"/>
																@endif
															</td>
														</tr>
														<tr>
															<td style="padding:20px;font-weight:bold">Dr.{{ $doctor->employee->name }}</td>
														</tr>
													</table>
													
												</td>
												<td>
													<table>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Email Address</th>
															<td style="text-align:left">{{ $doctor->employee->email }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Department</th>
															<td style="text-align:left">{{ $doctor->department->name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Designation</th>
															<td style="text-align:left">{{ $doctor->designation->desig_name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Address</th>
															<td style="text-align:left">{{ $doctor->employee->address }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Phone no</th>
															<td style="text-align:left">{{ $doctor->employee->phone }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Short Biography</th>
															<td style="text-align:left">{!! $doctor->biography !!}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Date of Birth</th>
															<td style="text-align:left">{{$doctor->employee->birth_date}}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Specialist</th>
															<td style="text-align:left">{{$doctor->specialist}}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Gender</th>
															<td style="text-align:left">
																@if($doctor->employee->gender==1)
																	{{"Male"}}
																@elseif($doctor->employee->gender==2)
																	{{"Female"}}
																@else
																	{{"Common"}}
																@endif
															</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Blood Group</th>
															<td style="text-align:left">{{$doctor->employee->blood->blood_name}}</td>
														</tr>
														<tr >
															<th style="float:right; padding-right: 40px;text-align:right">Education</th>
															<td style="text-align:left">{!! $doctor->education !!}</td>
														</tr>
														<tr >
															<th style="float:right; padding-right: 40px;text-align:right">Fees</th>
															<td style="text-align:left">TK.{!! $doctor->fees !!}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Created Date</th>
															<td style="text-align:left">{{$doctor->created_at}}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Updated Date</th>
															<td style="text-align:left">{{$doctor->updated_at}}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Status</th>
															<td style="text-align:left">
																@if($doctor->status==1)
																	{{"Active"}}
																@else
																	{{"Inactive"}}
																@endif
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</center>
								</div>
						  </div>
						<div class="panel-footer" style="text-align:center">
							<div>Hospital Limited</div>
							<div>2No Gate, Nasirabad, Chittagong</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>


<script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.PrintArea.js')}}"></script>
<script>
     $(document).ready(function(){
		
		/*for print a page*/
		 $('.print_btn').click(function(){
			w=window.open();
			w.document.write($('.panel-body').html());
			w.print();
			w.close(); 
		});
		
	 });
</script>

</main>
@endsection