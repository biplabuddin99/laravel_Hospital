@extends('app')
@section('content')



<main id="main" class="main">
<!-- Main content -->
	<section class="section">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Operation Report</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
							{{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}
									<a href="{{route('operation.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Operation Report </a>
							{{-- @endif	 --}}
									<a href="{{route('operation.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Operation Patient List</a>
									
									<a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
									
								</div>
							</div>
							 <div class="panel-body">
								<fieldset>
								<div style="text-align:center;margin-top:30px;">
									<h1 style="font-weight:bold;color:#207fdd">Operation Report</h1>
									<center style="margin-top: 50px;margin-bottom:50px;">
													<table>
                            <tr>
                              <th style="float:right; padding-right: 40px;text-align:right"><h3>Patient Name :</h3></th>
															<td style="text-align:left;font-weight:bold"><h3> {{ $operation->name }}</h3></td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Father's Name :</th>
															<td style="text-align:left">{{ $operation->father_name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Mother's Name :</th>
															<td style="text-align:left">{{ $operation->mother_name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Gender :</th>
															<td style="text-align:left">
																@if($operation->gender==1)
																	{{"Male"}}
																@elseif($operation->gender==2)
																	{{"Female"}}
																@else
																	{{"Common"}}
																@endif
															</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Date of Birth :</th>
															<td style="text-align:left">{{ $operation->dob }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Blood Group :</th>
															<td style="text-align:left">{{ $operation->blood }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Reference Doctor :</th>
															<td style="text-align:left">{{ $operation->doctor_ref }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Address :</th>
															<td style="text-align:left">{{ $operation->address }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Operation Date :</th>
															<td style="text-align:left">{{ $operation->opr_date }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">OT No :</th>
															<td style="text-align:left">{{ $operation->ot_no }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Description of Disease :</th>
															<td style="text-align:left">{{ $operation->description }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Created Date :</th>
															<td class=text-left>{{$operation->created_at}}</td>
														</tr>
													</table>

                    				</center>
									<div class="panel-footer text-center" >
										<div><h3>Hospital Limited</h3></div>
										<div>2No Gate, Nasirabad, Chittagong</div>
									</div>
								</fieldset>
								</div>
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