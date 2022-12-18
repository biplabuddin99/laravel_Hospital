@extends('app')
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">
						@if($role_id == 3)
							{{'List of Nurse'}}
						@elseif($role_id ==6)
							{{'List of Accountant'}}
						@elseif($role_id ==4)
							{{'List of Reciptionist'}}
						@else
							{{'List of Laboratorist'}}
						@endif
					</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading mb-3"><a href="{{route('employee.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Employee </a></div>
							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-borderless datatable">
												<thead>
													<tr>
														<th>SL.No</th>
														<th>Picture</th>
														<th>Name</th>
														<th>Address</th>
														<th>Phone</th>
														<th>Gender</th>
														<th>Blood Group</th>
														<th>Action</th>
													</tr>
												</thead>

												<tbody>

												@forelse($employee as $em)
													<tr>
															<td>{{ ++$loop->index }}</td>
														<td>

															@if($em['picture'] == '')
																<i class="fa fa-user-md" style="font-size:50px;"></i>
															@else
																<img width="50px" src="{{ asset('uploads/employee/'.$em->picture) }}" alt="no image">
															@endif

														</td>
														<td>{{ $em->name }}</td>
														<td>{{ $em->address }}</td>
														<td>{{ $em->phone }}</td>
														<td>
															@if($em['gender']==1)
																{{"Male"}}
															@else
																{{"Female"}}
															@endif
														</td>
														<td>{{$em->blood->blood_name}}</td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('employee.edit',$em->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                            {{-- <a href="javascript:void()" onclick="$('#form{{$des->id}}').submit()">
                                                                <i class="fa fa-trash"></i>
                                                            </a>  --}}
                                                             <form id="form{{$em->id}}" action="{{ route('employee.destroy',$em->id) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                                                            </form>
                                                        </td>
													</tr>
											@empty
												<tr>
													<td scope="col" colspan="9" style="text-align:center">No data found</td>
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
