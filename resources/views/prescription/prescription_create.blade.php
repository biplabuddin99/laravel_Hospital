@extends('app')
@section('content')
  <main id="main" class="main">
    <section class="section">
			<div class="row">
				<!-- left column -->
					<div class="col-md-12">
						<div class="title">Add Prescription</div>
						<div class="box box-info">
							<div class="panel panel-default pres">
							
							
								<div class="panel-heading"><a href="{{route('prescription.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Prescription List </a></div>
								
								
								<div class="panel-body">
								
								
									<form class="form-horizontal pres_form" action="{{route('prescription.store')}}" method="post">
										@csrf									
										<div class="row">
											<div class="col-md-12">
												<div class="row p1">
													<div class="col-md-4">
														<div class="form-group row">
															<div class="col-md-5">
																<label for="reg">Patient Id:</label>
															</div>
															<div class="col-md-7">
																<input type="hidden" name="app_id" id="app_id" value="{{$data->app_id}}"/>
																<input type="text" class="form-control" id="patient_id" name="patient_id"  value="{{$data->patient->patient_id}}">
															</div>
														</div>
													</div>
													<div class="col-md-offset-5 col-md-3">
														<div class="form-group row">
															<div class="col-md-3">
																<label for="date">Date:</label>
															</div>
															<div class="col-md-9">
																<input type="text" class="form-control " id="date_dis"  name="date" value="{{date('Y-m-d')}}" >
															</div>
														</div>
													</div>
												</div>
												<div class="row p2">
													<div class="col-md-6">
														 <div class="form-group row">
															<div class="col-md-2">
																<label for="name">Name:</label>
															</div>
															<div class="col-md-10">
																<input type="text" class="form-control" id="name" name="name" value="{{$data->patient->name}}">
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group row">
															<div class="col-md-2">
																<label for="age">Age: </label>
															</div>
															<div class="col-md-10">
																<input type="text" class="form-control" id="age" name="age" value="{{$data->patient->age}}">
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<div class="form-group row">
															<div class="col-md-2">
																<label for="sex">Sex: </label>
															</div>
															<div class="col-md-10">
																<input type="text" class="form-control" id="sex" name="sex" value="{{$s}}">
															</div>
														</div>
													</div>
												</div>
												<div class="row p3">
													<div class="col-md-12">
														<div class="form-group row">
															<div class="col-md-1">
																<label for="address">Address:</label>
															</div>
															<div class="col-md-11">
																<textarea class="form-control" rows="1" id="address" name="address">{{$data->patient->address}}</textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="row p4"  style="margin-bottom: 20px;">
													<div class="col-md-8">
														<div class="form-group row">
															<div class="col-md-1">
																<label for="dx">Dx:</label>
															</div>
															<div class="col-md-11">
																<textarea class="form-control" rows="1" id="dx" name="dx">{{$data->problem}}</textarea>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group row">
															<div class="col-md-3">
																 <label for="phone">Phone: </label>
															</div>
															<div class="col-md-9">
																 <input type="text" class="form-control" id="phone" name="phone" value="{{$data->patient->phone}}">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr />
										<div class="row second_row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="cc">C/C</label>
													<textarea class="form-control" rows="7" id="cc" name="cc"></textarea>
												</div>
												<div class="form-group">
													<label for="inv">INV</label>
													<textarea class="form-control" rows="7" id="inv" name="inv"></textarea>
												</div>
											</div>
											<div class="col-md-8 col-md-offset-1 others">
												<div class="portion_rx">
													<p style="font-weight: bold; font-size: 20px;">Rx:</p>
													<br />
													
													<div class="a">
													<div class="form-group row">
														<div class="col-md-2">
															<label for="medicine">Medicine: </label>
														</div>
														<div class="col-md-5">
															<input type="text" class="form-control" placeholder="medicine name" id="m_name">
														</div>
														<div class="col-md-5">
															<input type="text" class="form-control" placeholder="medicine type" id="m_type">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-md-2">
															<label for="dose">Dose: </label>
														</div>
														<div class="col-md-3">
															<input type="text" class="form-control" placeholder="dose" id="dose">
														</div>
														<div class="col-md-3">
															<select class="form-control" id="note">
																<option value="1">after meal</option>
																<option value="2">before meal</option>
															</select>
														</div>
														<div class="col-md-4">
															<input type="text" class="form-control" placeholder="duration" id="duration">
														</div>
													</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<center>
																<button type="button" class="btn btn-success add" name="add">Add Medicine</button>
															</center>
														</div>
													</div>
													<br />
													<div class="medi"></div>
													<div class="row medi1">
														<div class="col-md-12">
															<table class="table table-striped">
																<thead>
																	<tr>
																		<th>Medicine Name</th>
																		<th>Dose</th>
																		<th>Note</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody id="list">
																
																</tbody>
															</table>
														</div>
													</div>
													<br />
													<div class="form-group row">
														<div class="col-md-2">
															<label for="advice">Advice:</label>
														</div>
														<div class="col-md-10">
															<textarea class="form-control" rows="1" id="advice" name="advice"></textarea>
														</div>
													</div>
													<br />
													<div class="form-group row">
														<div class="col-md-3">
															<label for="advice">Next visit:</label>
														</div>
														<div class="col-md-9">
															After <input type="number" name="visit" id="visit" /> days
														</div>
													</div>
												</div>
											</div>
										</div>
										<hr />
										<div class="form-group">        
											<div class=" col-md-4 col-md-offset-4 change-btn">
												<button type="reset" class="btn btn-primary">Reset</button>
												<span class="btn or">or</span>
												<button type="submit" class="btn btn-success save-btn">Save</button>
											</div>
										</div>
									</form>
	
								</div>
							</div>
						</div>
					</div>
					<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</section>
	</main>
		<!-- jQuery 3 -->
		<script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.table').css('display','none');
				
				/*append row in table for medicine list*/
				
				
				$('.add').click(function(){
					
					$('.table').css('display','block');	
					
					div = "<tr><td>"+"<input type='hidden' name='m_name[]' value='"+$('#m_name').val()+"'><input type='hidden' name='m_type[]' value='"+$('#m_type').val()+"'>"+$('#m_name').val()+' - '+$('#m_type').val()+"</td><td><input type='hidden' name='dose[]' value='"+$('#dose').val()+"'/>"+$('#dose').val()+"</td><td>"+"<input type='hidden' name='note[]' value='"+$('#note').val()+"'/><input type='hidden' name='duration[]' value='"+$('#duration').val()+"'/>"+$('#note option:selected').text()+'   '+$('#duration').val()+"</td><td>"+"<i class='fa fa-times btn btn-sm btn-default dlt' style='color:red;'></i>"+"</td></tr>";
					
					$('#list').append(div);
					$('#m_name').val('');
					$('#m_type').val('');
					$('#dose').val('');
					$('#duration').val('');
				});
				
				$(document).on('click', '.dlt', function(){
					$(this).parent('td').parent('tr').remove();
				});
				
			});
		</script>
	
	@endsection
