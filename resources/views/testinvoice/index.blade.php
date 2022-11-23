@extends('app')
@section('title','Invoice Test')

@section('content')
  <main id="main" class="main">
    <section class="section">
        <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Invoice List</div>
					<div class="box box-info">
						<div class="panel panel-default">
						@if(Auth::user()->employ_func->role->role_id == 17)
							<div class="panel-heading"><a href="{{route('test.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Invoice </a></div>
						@endif
							<div class="panel-body">
								<!-- div.dataTables_borderWrap -->
										<div>
											<table id="myTable" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>SL.No</th>
														<th>Date</th>
														<th>Patient Id</th>
														<th>Total</th>
														<th>Vat</th>
														<th>Discount</th>
														<th>Grand Total</th>
														<th>Paid</th>
														<th>Due</th>
														<th style="width:80px">Action</th>
													</tr>
												</thead>

												<tbody>

												@forelse($invoice as $l)
													<tr>
														<td>{{$i++}}</td>
														<td>{{$l->created_at->todatestring()}}</td>
														<td>{{$l->patient->patient_id}}</td>
														<td>{{$l->total}}</td>
														<td>{{$l->vat}}</td>
														<td>{{$l->discount}}</td>
														<td>
															{{($l->total+$l->vat)-$l->discount}}
														</td>
														<td>{{$l->paid}}</td>
														<td>
															@if($l->paid_status==0)
																{{($l->total+$l->vat-$l->discount)-$l->paid}}
															@else
																{{"0.00"}}
															@endif
														</td>
														<td>
															<div style="font-size:10px;">
																<form action="{{route('test.destroy',$l->test_id)}}" method="post">
																	<input type="hidden" name="_method" value="delete" />
																	<input type="hidden" name="_token" value="{{Session::token()}}" />

																	<a class="edit btn btn-sm btn-success" style="padding-right:8px" href="{{route('test.show',$l->test_id)}}">
																	<i class="ace-icon fa fa-eye"></i>
																	</a>
																	<a class="edit btn btn-sm btn-primary" style="padding-right:8px" href="{{route('test.edit',$l->test_id)}}">
																	<i class="ace-icon fa fa-edit"></i>
																	</a>

																@if(Auth::user()->employ_func->role->role_id == 17)
																	<button class="edit btn btn-sm btn-danger"  type="submit" onclick="return confirm('Are you sure?')">
																		<i class="ace-icon fa fa-trash-o"></i>
																	</button>
																@endif
																</form>
															</div>
														</td>
													</tr>
											@empty
												<tr>
													<td scope="col" colspan="10" style="text-align:center">No data found</td>
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
