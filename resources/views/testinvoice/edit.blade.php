@extends('app')
@section('title','Invoice')

@section('content')
<main id="main" class="main">
    <section class="content">
        <div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Edit Invoice</div>
					<div class="box box-info">
						<div class="panel panel-default">
							<div class="panel-heading"><a href="{{route('invoiceTest.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Invoice List </a></div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="{{route('invoiceTest.update',$invoiceTest->id)}}">
                                    @csrf
                                    @method('patch')

								{{-- <input type="hidden" name="_method" value="PATCH" />
								<input type="hidden" name="_token" value="{{Session::token()}}" /> --}}

									<input type="hidden" name="test_id" value="{{$invoiceTest->id}}"/>
									<input type="hidden" name="patient_id" value="{{$invoiceTest->patient_id}}" />
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="m-3">
                                                <label class="control-label" for="FullName">Full Name:</label>
                                            <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="FullName" name="FullName" value="{{ old('FullName',$invoiceTest->name) }}" required>
                                            </div>
                                        </div>
                                        <div class="m-3">
                                                <label for="age" class="col-form-label">Age:</label>
                                                <div class="col-sm-10">
                                                <input type="text" name="patientAge" class="form-control" id="age" value="{{ old('patientAge',$invoiceTest->age) }}">
                                                @if($errors->has('patientAge'))
                                                        <span class="text-danger">
                                                        {{ $errors->first('patientAge') }}
                                                        </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="m-3">
                                                <label class="control-label" for="fullAdress">Address:</label>
                                                <div class="col-sm-10">
                                                        <textarea name="fullAdress" id="fullAdress" cols="30" class="form-control" rows="5" required></textarea>
                                                </div>
                                        </div>
                                   </div>
                                  <div class="col-md-6 col-sm-6">
                                        <div class="m-3">
                                                <label class="control-label col-sm-5" for="contactNumber">Phone:</label>
                                            <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="{{ old('contactNumber',$invoiceTest->phone) }}" required>
                                            </div>
                                        </div>

                                        <div class="m-3">
                                                        <label class="control-label" for="gender">Gender:</label>
                                                <div class="col-sm-10">
                                                        <input type="radio" name="gender" value="1" checked id="m"> Male
                                                        &nbsp;
                                                        <input type="radio" name="gender" value="2" id="f"> Female
                                                        &nbsp;
                                                        <input type="radio" name="gender" value="3" id="c"> Common
                                                </div>
                                        </div>
                                        <div class="m-3">
                                            <label for="blood" class="col-form-label">Blood:</label>
                                            <div class="">
                                                <select class="form-control" name="patientBlood" id="patientBlood">
                                                    <option value="">Select Blood Group</option>
                                                    <option value="A+" {{ old('patientBlood',$invoiceTest->blood)=='A+' ? 'selected':''}}>A+</option>
                                                    <option value="A-"{{ old('patientBlood',$invoiceTest->blood)=='A-' ? 'selected':''}}>A-</option>
                                                    <option value="B+"{{ old('patientBlood',$invoiceTest->blood)=='B+' ? 'selected':''}}>B+</option>
                                                    <option value="B-"{{ old('patientBlood',$invoiceTest->blood)=='B-' ? 'selected':''}}>B-</option>
                                                    <option value="O+"{{ old('patientBlood',$invoiceTest->blood)=='O+' ? 'selected':''}}>O+</option>
                                                    <option value="O-"{{ old('patientBlood',$invoiceTest->blood)=='O-' ? 'selected':''}}>O-</option>
                                                    <option value="AB+"{{ old('patientBlood',$invoiceTest->blood)=='AB+' ? 'selected':''}}>AB+</option>
                                                    <option value="AB-"{{ old('patientBlood',$invoiceTest->blood)=='AB-' ? 'selected':''}}>AB-</option>
                                                </select>
                                                @if($errors->has('patientBlood'))
                                            <span class="text-danger">
                                                {{ $errors->first('patientBlood') }}
                                            </span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                               </div>
									<!--########### Patient Test inforMation ############### -->

									<div class="panel-group" style="margin-left:-16px; margin-right:-16px;">
										<div class="panel panel-default">
											<div class="panel-heading"><h4>Patient Test Information</h4></div>
												<div class="panel-body">
													<table class="table table-striped" width=100% style="font-size:18px;">
														<tr class="bg-primary">
															<td style="padding:12px 0;">Test Categoroy</td>
															<td>Test Name</td>
															<td>Price</td>
														</tr>
														@foreach($test_d as $t)
                                                            <tr>
                                                                <td>{{$t->test->test_category->name}}</td>
                                                                <td>{{$t->test->name}}</td>
                                                                <td>{{$t->test->price}}</td>
                                                            </tr>
														@endforeach
													</table>
													 <table id="invoice" class="table table-striped">
														<tr class="bg-info">
															<td colspan="3"></td>
															<th class="text-right">Total</th>
															<th><input type="text" name="total" id="total" class="form-control" readonly required placeholder="Total"  value="{{$invoiceTest->total}}"></th>
															<td></td>
														</tr>
														<tr>
															<th colspan="3" class="text-right">Vat</th>
															<td>
																<div class="input-group">
																  <div class="input-group-addon">%</div>
																  <input type="text" id="vatParcent" required   class="form-control"name="vat" value="{{($invoiceTest->vat/$invoiceTest->total)*100}}" onKeyup="vat_discount()">
																</div>
															</td>
															<td><input type="text" id="vat" required class="vatDiscount paidDue form-control" placeholder="Vat" value="{{$invoiceTest->vat}}" ></td>
															<td></td>
														</tr>
														<tr>
															<th colspan="3" class="text-right">Discount</th>
															<td>
																<div class="input-group">
																  <div class="input-group-addon">%</div>
																  <input type="text"name="discount"  id="discountParcent" required class=" form-control" value="{{($invoiceTest->discount/$invoiceTest->total)*100}}" onKeyup="vat_discount()" >
																</div>
															</td>

															<td><input type="text" required id="discount" class="vatDiscount paidDue form-control" placeholder="Discount"  value="{{$invoiceTest->discount}}" ></td>
															<td></td>
														</tr>
														<tr class="bg-success">
															<td colspan="3"></td>
															<th class="text-right">Grand Total</th>
															<th><input type="text" name="grand_total" readonly required  id="grand_total" class="paidDue form-control" placeholder="Grand Total" value="{{($invoiceTest->total+$invoiceTest->vat)-$invoiceTest->discount}}" onKeyup="vat_discount()" ></th>
															<td></td>
														</tr>
														<tr>
															<td colspan="3"></td>
															<th class="text-right">Paid</th>
															<td><input type="text" name="paid" id="paid_id" class="paid_id form-control" required placeholder="Paid"  value="{{$invoiceTest->paid}}"></td>
															<td></td>
														</tr>
														<tr class="bg-danger">
															<td colspan="3"></td>
															<th class="text-right">Due</th>
															<td><input type="text" name="due" id="due" class="paidDue form-control" required placeholder="Due" value="{{($invoiceTest->total+$invoiceTest->vat-$invoiceTest->discount)-$invoiceTest->paid}}"></td>
															<td></td>
														</tr>
													</table>
												</div>
										</div>
									</div>
									<div class="form-group">
									<div class="col-sm-offset-8 col-sm-9 change-btn">
									<button type="reset" class="btn btn-primary">Reset</button>
									<span class="btn or">or</span>
									<button type="submit" class="btn btn-success save-btn">Update</button>
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
		$(".paid_id").keyup(function() {
		 var grand_total =$('#grand_total').val();

		var paid =$('#paid_id').val();
		var due = ((parseFloat(grand_total)-parseFloat(paid))).toFixed(2);

		if (due < 1){
			due = 0;
		}
		$('#due').val(due).toFixed(2);

		});
	});
</script>

</section>
</main>
@endsection
