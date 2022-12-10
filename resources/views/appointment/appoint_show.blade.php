@extends('app')
@section('content')
<main id="main" class="main">
<!-- Main content -->
	<section class="section">
    <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Appointment</div>
						<div class="panel panel-default print-body">
							<div style="color: #fff;background-color:#62d0f1; height:150px;padding:30px;overflow:hidden;border:1px solid #62d0f1;">
								<div style="float:left;">
									<table>
										<tr>
											<th style="text-align:right">Doctor</th>
											<td style="text-align:left;padding-left: 20px;">{{$show->employee->name}}</td>
										</tr>
										<tr>
											<th style="text-align:right;">Department</th>
											<td style="text-align:left;padding-left: 20px;">{{$show->doctor->department->name}}</td>
										</tr>
										<tr>
											<th style="text-align:right;" >Available Day</th>
											<td style="text-align:left;padding-left: 20px;">{{$show->schedule->day->name}}</td>
										</tr>
										<tr>
											<th style="text-align:right;">Schedule Time</th>
											<td style="text-align:left;padding-left: 20px;">{{ date('h:i a',strtotime($show->schedule->shift->start)) }} - {{ date('h:i a',strtotime($show->schedule->shift->end)) }}</td>
										</tr>
									</table>
								</div>
								<div style="float:right;text-align:right">
									<table>
										<tr>
											<th style="text-align:right;">Serial No</th>
											<td style="text-align:left;padding-left: 20px;">{{'#'.$show->serial}}</td>
										</tr>
										<tr>
											<th style="text-align:right;">Appointment Date</th>
											<td style="text-align:left;padding-left: 20px;">{{$show->appoint_date}}</td>
										</tr>
										<tr>
											<th style="text-align:right;">Fees</th>
											<td style="text-align:left;padding-left: 20px;">{{'TK.' .$show->doctor->fees}}</td>
										</tr>
									</table>
								</div>
							</div>
							
							<div style="border:1px solid #62d0f1;">
							<div style="text-align:center; color:#374767;font-size:30px;font-weight:bold;margin-top: 30px; ">
								<p>Appointment Information</p>
							</div>
								<div style="padding:20px;">
									<center>
										<table>
											<tr>
												<th style="text-align:right;">Full Name</th>
												<td style="text-align:left;padding-left: 20px;">{{$show->patient->name}}</td>
											</tr>
											<tr>
												<th style="text-align:right;">Patient Id</th>
												<td style="text-align:left;padding-left: 20px;">{{$show->patient->patient_id}}</td>
											</tr>
											<tr>
												<th style="text-align:right;">Date of Birth</th>
												<td style="text-align:left;padding-left: 20px;">{{$show->patient->dob}}</td>
											</tr>
											<tr>
												<th style="text-align:right;">Gender</th>
												<td style="text-align:left;padding-left: 20px;">
													@if($show->patient->gender == 1)
														{{'Male'}}
													@elseif($show->patient->gender == 2)
														{{'Female'}}
													@else
														{{'Common'}}
													@endif
												</td>
											</tr>
											<tr>
												<th style="text-align:right;">Mobile No</th>
												<td style="text-align:left;padding-left: 20px;">{{$show->patient->phone}}</td>
											</tr>
											<tr>
												<th style="text-align:right;">Problem</th>
												<td style="text-align:left;padding-left: 20px;">{{$show->problem}}</td>
											</tr>
											<tr>
												<th style="text-align:right;">Status</th>
												<td style="text-align:left;padding-left: 20px;">
													@if($show->approve == 1)
														{{'Approve'}}
													@else
														{{'Not Approve'}}
													@endif
												</td>
											</tr>
										</table>
									</center>
								</div>
							</div>
					<div style="text-align:center;border:1px solid #62d0f1;padding:20px;">
						<div>Biplab,Zalal & Tawhid Limited</div>
						<div>2no Gate, Nasirabad, Chattagram</div>
					</div>
				</div>	
				<a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
				</div>
				<!--/.col (right) -->
		</div>
		<!-- /.row -->
  </section>
</main>
<script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.PrintArea.js')}}"></script>
<script>
     $(document).ready(function(){
		
		/*for print a page*/
		 $('.print_btn').click(function(){
			w=window.open();
			w.document.write($('.print-body').html());
			w.print();
			w.close(); 
		});
		
	 });
</script>
@endsection
