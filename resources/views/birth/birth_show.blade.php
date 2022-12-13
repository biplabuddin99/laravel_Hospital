@extends('app')
@section('content')



<main id="main" class="main">
<!-- Main content -->
	<section class="section">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Birth Report</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
							{{-- @if(Auth::user()->employ_func->role->role_id == 17) --}}
									<a href="{{route('birth.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Birth Report </a>
							{{-- @endif	 --}}
									<a href="{{route('birth.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Child List</a>
									
									<a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
									
								</div>
							</div>
							 <div class="panel-body">
								<fieldset>
								<div style="text-align:center;margin-top:30px;">
									<h1 style="font-weight:bold;color:#207fdd">Birth Report</h1>
									<center style="margin-top: 50px;margin-bottom:50px;">
													<table>
                            <tr>
                              <th style="float:right; padding-right: 40px;text-align:right"><h3>Child Name :</h3></th>
															<td style="text-align:left;font-weight:bold"><h3> {{ $birth->name }}</h3></td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Father's Name :</th>
															<td style="text-align:left">{{ $birth->father_name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Mother's Name :</th>
															<td style="text-align:left">{{ $birth->mother_name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Child Gender :</th>
															<td style="text-align:left">
																@if($birth->gender==1)
																	{{"Male"}}
																@elseif($birth->gender==2)
																	{{"Female"}}
																@else
																	{{"Common"}}
																@endif
															</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Date of Birth :</th>
															<td style="text-align:left">{{ $birth->dob }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Blood Group :</th>
															<td style="text-align:left">{{ $birth->blood }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Reference Doctor :</th>
															<td style="text-align:left">{{ $birth->doctor->employee->name }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Address :</th>
															<td style="text-align:left">{{ $birth->address }}</td>
														</tr>
														<tr>
															<th style="float:right; padding-right: 40px;text-align:right">Created Date :</th>
															<td class=text-left>{{$birth->created_at}}</td>
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