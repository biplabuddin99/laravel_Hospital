@extends('app')
@section('title','Shift')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Shift Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol>
    </nav>
  </div>
  <section class="section">

    <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Manage Shift</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading mb-3"><a href="{{route('shift.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add shift </a></div>
							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-borderless datatable">
												<thead>
													<tr>
														<th>SL.No</th>
														<th>Shift Name</th>
														<th class="hidden-480">Time</th>
														<th class="hidden-480">Status</th>
														<th>Action</th>
													</tr>
												</thead>

											<tbody>

												@forelse($shif as $s)
													<tr>
														<td>{{++$loop->index}}</td>
														<td>{{$s['name']}}</td>
                                                         <td>{{ date('h:i a',strtotime($s->start)) }} - {{ date('h:i a',strtotime($s->end)) }}</td>
														<td>
															@if($s['status']==1)
																{{"Active"}}
															@else
																{{"Inactive"}}
															@endif
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">

																<a href="{{route('shift.edit',$s['id'])}}" class="edit btn btn-sm btn-primary">
																<i class="fa fa-edit bigger-130"></i>
																</a>

															</div>
														</td>
													</tr>
											@empty
												<tr>
													<td scope="col" colspan="5" class="text-center">No data found</td>
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
