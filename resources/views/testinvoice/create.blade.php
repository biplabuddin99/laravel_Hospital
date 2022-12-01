@extends('app')
@section('title','Shift')

@section('content')
<main id="main" class="main">
    <section class="content">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Create Invoice</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading mb-3"><a href="{{route('invoiceTest.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Invoice List </a></div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="{{route('invoiceTest.store')}}">
                                    @csrf
                                    @method('POST')
								{{-- <input type="hidden" name="_token" value="{{Session::token()}}" /> --}}
								<input type="hidden" name="checkExist" id="checkExist" value="0" />
								{{-- <input type="hidden" name="cr_name" value="{{Auth::user()->employ_func->employ_id}}" /> --}}


									<!-- ======= Patient ID Modal ======== -->
										<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog">

										  <!-- Modal content-->
										  <div class="modal-content">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title">Patient Id</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<div class="col-md-12 ">
															<label class="control-label col-md-3 " for="patient_id">Patient ID<span style="color:red" >* </span>:</label>
														<div class="col-md-6">
															<input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Search Patient">
															<span class="">

															</span>
														</div>
														<button class="btn btn-secondary" id="search_p" type="button" data-dismiss="modal">Search Patient</button>
													</div>
												</div>
											</div>
											<div class="modal-footer">
											  <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										</div>
										</div>

									<div class="row">
										<div class="col-12">
											<button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#myModal" style="margin-right:33px;"><i class="fa fa-search-plus" style="padding-right:10px;"></i>Search Patient ID</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6">
												<div class="m-3">
														<label class="control-label col-sm-4" for="FullName">Full Name:</label>
													<div class="col-sm-10">
															<input type="text" class="form-control" id="fname" name="FullName" value="{{ old('FullName') }}" required>
													</div>
												</div>
												<div class="m-3">
														<label for="age" class="col-sm-2 col-form-label">Age:</label>
														<div class="col-sm-10">
														<input type="text" name="patientAge" class="form-control" id="age" value="{{ old('patientAge') }}">
														@if($errors->has('patientAge'))
																<span class="text-danger">
																{{ $errors->first('patientAge') }}
																</span>
																@endif
														</div>
												</div>
												<div class="m-3">
														<label class="control-label col-sm-2" for="present_add">Address:</label>
														<div class="col-sm-10">
																<textarea name="present_address" id="present_add" cols="30" class="form-control" rows="5" required></textarea>
														</div>
												</div>
										</div>
										<div class="col-md-6 col-sm-6">
													<div class="m-3">
																<label class="control-label col-sm-5" for="phone">Phone:</label>
															<div class="col-sm-7">
																	<input type="text" class="form-control" id="phone" name="phone" value="{{ Request::old('phone') }}" required>
															</div>
												</div>
											<div class="m-3">
															<label class="control-label col-sm-2" for="sex">Gender:</label>
													<div class="col-sm-10">
															<input type="radio" name="sex" value="1" checked id="m"> Male
															&nbsp;
															<input type="radio" name="sex" value="2" id="f"> Female
															&nbsp;
															<input type="radio" name="sex" value="3" id="c"> Common
													</div>
											</div>
											<div class="m-3">
															<label class="control-label col-sm-5" for="blood">Blood Group:</label>
													<div class="col-sm-7">
															<select class="form-control" id="blood" name="blood" required>
																	<option>-- select --</option>
																	@foreach($blood as $b)
																			<option value="{{$b->blood_id}}">{{$b->blood_name}}</option>
																	@endforeach
															</select>
													</div>
											</div>
										</div>

									</div>
									<!--########### Patient Test inforMation ############### -->

									<div class="panel-group" style="margin-left:-16px; margin-right:-16px;">
										<div class="panel panel-default">
											<div class="panel-heading"><h4>Patient Test Information</h4></div>
												<div class="panel-body">

													 <table id="invoice" class="table table-striped">
														<thead>
															<tr class="bg-primary">
																<th colspan="2">Test Catagory</th>
																<th colspan="2">Test Name</th>
																<th width="120">Price</th>
																<th width="160">Add / Remove</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td colspan="2">
																	<select class="form-control inv_cat_id dont-select-me" onchange="get_test(this)">
																			<option value="0"> -- Invest Category -- </option>

																			@foreach($testcategory as $tc)
																				<option value="{{$tc->id}}">{{$tc->name}}</option>
																			@endforeach
																	</select>
																</td>
																<td colspan="2">
																	<select class="form-control test_name" id="test_name" name="inv_list_id[]" onChange="get_price(this)";>
																			<option value="0"> -- Investigation Name -- </option>
																	</select>
																</td>
																<td>
																	<input type="text" name="price[]" required readonly class="form-control price" placeholder="Price" value="0.00">
																</td>

																<td>
																  <div class="btn btn-group">
																	<button type="button" class="btn btn-sm btn-primary addBtn">Add</button>
																	<button type="button" class="btn btn-sm btn-danger removeBtn">Remove</button>
																   </div>
																</td>
															</tr>
														</tbody>
														<tfoot>
															<tr class="bg-info">
																<td colspan="3"></td>
																<th class="text-right">Total</th>
																<th><input type="text" name="total" id="total" class="form-control" readonly required placeholder="Total"  value="0.00"></th>
																<td></td>
															</tr>
															<tr>
																<th colspan="3" class="text-right">Vat</th>
																<td>
																	<div class="input-group">
																	  <div class="input-group-addon">%</div>
																	  <input type="text" id="vatParcent" required   class="form-control"name="vat" value="0" onKeyup="vat_discount()">
																	</div>
																</td>
																<td><input type="text" id="vat" required class="vatDiscount paidDue form-control" placeholder="Vat" value="0.00" ></td>
																<td></td>
															</tr>
															<tr>
																<th colspan="3" class="text-right">Discount</th>
																<td>
																	<div class="input-group">
																	  <div class="input-group-addon">%</div>
																	  <input type="text"name="discount"  id="discountParcent" required class=" form-control" value="0" onKeyup="vat_discount()" >
																	</div>
																</td>

																<td><input type="text" required id="discount" class="vatDiscount paidDue form-control" placeholder="Discount"  value="0.00" ></td>
																<td></td>
															</tr>
															<tr class="bg-success">
																<td colspan="3"></td>
																<th class="text-right">Grand Total</th>
																<th><input type="text" name="grand_total" readonly required  id="grand_total" class="paidDue form-control" placeholder="Grand Total" value="0.00" onKeyup="vat_discount()" ></th>
																<td></td>
															</tr>
															<tr>
																<td colspan="3"></td>
																<th class="text-right">Paid</th>
																<td><input type="text" name="paid" id="paid" class="paidDue form-control" required placeholder="Paid"  value="0.00" onKeyup="get_due()"></td>
																<td></td>
															</tr>
															<tr class="bg-danger">
																<td colspan="3"></td>
																<th class="text-right">Due</th>
																<td><input type="text" name="due" id="due" class="paidDue form-control" required placeholder="Due" value="0.00"></td>
																<td></td>
															</tr>

														</tfoot>
													</table>
												</div>
										</div>
									</div>
									<div class="form-group">
									<div class="col-sm-offset-5 col-sm-7 change-btn">
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

<script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
	$(document).ready(function() {
		//#------------------------------------
		//   Patient ID Search
		//#------------------------------------
			$('#search_p').click(function(){
			var patient_id = $('#patient_id').val();
			$.ajax({
				url:'{{ url('patient/search') }}',
				type: 'GET',
				data: {'id':patient_id},
				success: function(data){
					//console.log(data);
					if(data){
						$('#checkExist').val(data[0].id);
						$('#fname').val(data[0].name);
						$('#age').val(data[0].age);
						$('#email').val(data[0].email);
						$('#phone').val(data[0].phone);
						$('#present_add').val(data[0].present_address);
						$('#permanent_address').val(data[0].permanent_address);
						$('#picture').val(data[0].picture);
						$('#birthdate').val(data[0].birth_date);
						if(data[0].sex==1){
							$('#m').attr('checked', true);
						} else if(data[0].sex==2){
							$('#f').attr('checked', true);
						} else if(data[0].sex==2){
							$('#c').attr('checked', true);
						} else{
						}

						var bloodGroup = data[0].blood_id;
						$('#blood option').each(function(){
							var a = $(this).val();
							if(bloodGroup == a){
								$(this).attr('selected', true);
							}
						});
					}
				}
			});
		});

		//#------------------------------------
		//   STARTS OF DYNAMIC FORM
		//#------------------------------------
		//add row
		var body      = $('#invoice > tbody');
		$('body').on('click','.addBtn' ,function() {

			$('#invoice > tbody >tr:last').clone().insertAfter('#invoice > tbody >tr:last');
			$("#invoice > tbody >tr:last input[type='text']").val('');
			$("#invoice > tbody >tr:last .test_name").html('');
			//$('.select2').select2();


		});

		//remove row
		$('body').on('click','.removeBtn' ,function() {
        $(this).parent().parent().parent().remove();
		var total = 0;
			$('.price').each(function(){
				total += parseFloat($(this).val());
				$('#total').val(total.toFixed(2));
			});
		});


	});

function get_test(v){
			$(v).parent('td').siblings('td').find('select').html('');
			$.ajax({
				url:'{{ url('test/get_test') }}',
				type: 'GET',
				data: {'id': $(v).val()},

				success: function(data){
					if(data){
						console.log(data);
						$(v).parent('td').siblings('td').find('select').append("<option value=''> -- Investigation Name -- </option>");
						for(var i in data)
						$(v).parent('td').siblings('td').find('select').append("<option value='"+data[i].inv_list_id+"'>"+data[i].invest_name+"</option>");
					}


				}
			});
}
function get_price(v){
	$(v).parent('td').siblings('td').find('.price').html('');
	$.ajax({
		url:'{{ url('test/get_test_price') }}',
		type: 'GET',
		data: {'id': $(v).val()},

		success: function(data){
			if(data){

				$(v).parent('td').siblings('td').find('.price').val(data.price);
				var total = 0;
			$('.price').each(function(){

				total += parseFloat($(this).val());
				$('#total').val(total.toFixed(2));
				$('#grand_total').val(total.toFixed(2));
			});
			}


		}
	});
}
	function vat_discount(){
		var total = $('#total').val();
		var vatParcent = $('#vatParcent').val();
		$('#vat').val(parseFloat((total * vatParcent)/100).toFixed(2));
		//vat in discount
		var discountParcent = $('#discountParcent').val();
		$('#discount').val(parseFloat((total * discountParcent)/100).toFixed(2));
		//grand total
		var vat = $('#vat').val();
		var discount = $('#discount').val();
		$('#grand_total').val(((parseFloat(total)+parseFloat(vat)-parseFloat(discount))).toFixed(2));
	}
	function get_due(){
		 var grand_total =$('#grand_total').val();

		var paid =$('#paid').val();
		var due = ((parseFloat(grand_total)-parseFloat(paid))).toFixed(2);

		if (due < 1){
			due = 0;
		}
		$('#due').val(due).toFixed(2);
	}


</script>
</main>
@endsection
