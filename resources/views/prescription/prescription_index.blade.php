@extends('app')
@section('content')

<!-- Main content -->
	<section class="content">
	<div class="row">
		<div class="col-md-12">
			 @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
			@endif
		</div>
	</div>
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Prescription List</div>
					<div class="box box-info">
						<div class="panel panel-default">
							
							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>SL.No</th>
														<th>Patient Id</th>
														<th>Doctor Name</th>
														<th>Department</th>
														<th>Date</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
												
												@forelse($list as $l)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$l->appointment->patient_id}}</td>
														<td>{{$l->appointment_func->employee->name.' '.$l->appointment->employee->last_name}}</td>
														<td>{{$l->appointment->doctor->department->dep_name}}</td>
														<td>{{$l->created_at->todatestring()}}</td>
														<td>
															<div>
																
																<!--for view prescription-->
																<a class="edit btn btn-sm btn-primary" style="padding-right:8px" href="{{route('prescription.show',$l['app_id'])}}">
																<i class="ace-icon fa fa-file-text bigger-130"></i>
																</a>
															</div>
														</td>
													</tr>
											@empty
												<tr>
													<td scope="col" colspan="8" style="text-align:center">No data found</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>

@endsection