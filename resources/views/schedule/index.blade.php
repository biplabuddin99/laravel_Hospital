@extends('app')
@section('title','Schedule')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
  </div>

  <section class="section">
    <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Manage Schedule</div>
					<div class="box box-info">
						<div class="panel panel-default">
						{{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}
							<div class="panel-heading mb-3">
								<a href="{{route('schedule.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Schedule </a>
							</div>
						{{-- @endif --}}
							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>SL.No</th>
														<th>Name</th>
														<th class="hidden-480">Available Day</th>
														<th class="hidden-480">Available Time</th>
														<th class="hidden-480">Status</th>
														{{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}
														<th>Action</th>
														{{-- @endif --}}
													</tr>
												</thead>

                                            <tbody>

                                                    @forelse($sched as $sch)
                                                        <tr>
                                                            <td>{{ ++$loop->index}}</td>
                                                            <td>
                                                                {{'Dr. '. $sch->employee->name }}
                                                            </td>
                                                            <td>
                                                                {{$sch['day']['name']}}
                                                            </td>

                                                            <td>
                                                                {{$sch['shift']['start']. '  to  ' .$sch['shift']['end']}}
                                                            </td>
                                                            <td>
                                                                @if($sch['status']==1)
                                                                    {{"Active"}}
                                                                @else
                                                                    {{"Inactive"}}
                                                                @endif


                                                            </td>
                                                            {{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}

                                                            <td>
                                                                <div class="hidden-sm hidden-xs action-buttons">
                                                                    <form action="{{route('schedule.destroy',$sch['id'])}}" method="post">
                                                                        <input type="hidden" name="_method" value="delete" />
                                                                        <input type="hidden" name="_token" value="{{Session::token()}}" />

                                                                        <!--<a href="{{route('schedule.edit',$sch['id'])}}" class="edit btn btn-sm btn-primary">
                                                                            <i class="fa fa-edit bigger-130"></i>
                                                                        </a>-->

                                                                        <button class="edit btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">
                                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            {{-- @endif --}}
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td scope="col" colspan="6" class="text-center">No data found</td>
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
