@extends('app')
@section('title','Prescription')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Prescription List</div>
					<div class="box box-info">
						<div class="panel panel-default">

							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-borderless datatable">
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

												@forelse($prescription as $l)
													<tr>
														<td>{{++$loop->index}}</td>
														<td>{{$l->appointment->patient_id}}</td>
														<td>{{$l->appointment->employee->name}}</td>
														<td>{{$l->appointment->doctor->department->name}}</td>
														<td>{{$l->created_at->format('d M Y')}}</td>
														<td>
															<div>

																<!--for view prescription-->
																<a class="edit btn btn-sm btn-primary" style="padding-right:8px" href="{{route('prescription.show',$l->appointment_id)}}">
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
  </main>
  @endsection
