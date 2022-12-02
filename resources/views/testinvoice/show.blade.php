@extends('app')
@section('title','Show')

@section('content')
<main id="main" class="main">
    <section class="content">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Invoice</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
									<a href="{{route('invoiceTest.create')}}" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Invoice</a>

									<a href="{{route('invoiceTest.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Invoice List</a>

									<a class="btn btn-md btn-danger list-btn divPrint"><i class="fa fa-print"></i></a>

								</div>
							</div>
							<div class="panel-body printableDiv">
								<div  style="margin:20px;">
									<center style="color: #367FA9;font-weight:bold">
										<div>Demo Hospital Limited</div>
										<div>98 Green Road, Dhaka</div>
										<div>Hospital.bd@gmail.com</div>
										<div>192295465</div>
									</center>
									<div style="overflow:hidden;text-transform: capitalize; margin: 20px 0;border-bottom:1px dotted #3A4651;">
										<div style="float:left;margin-bottom: 20px;">
											<table style="text-align:left">
												<tr>
													<th style="text-align:left;padding-right:15px;">Invoice Id</th>
													<td style="text-align:left">: {{'INV'.$data->test_id}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Patient Id</th>
													<td style="text-align:left">: {{$data->patient->patient_id}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Patient Name</th>
													<td style="text-align:left">: {{$data->patient->name}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Mobile</th>
													<td style="text-align:left">: {{$data->patient->phone}}</td>
												</tr>
											</table>
										</div>
										<div style="float:right;">
											<table style="text-align:right">
												<tr>
													<th style="text-align:left;padding-right:15px;">Date</th>
													<td style="text-align:left">: {{$data->created_at->format('d/m/Y')}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Time</th>
													<td style="text-align:left">: {{$data->created_at->format('H:i:s')}}</td>
												</tr>
												{{-- <tr>
													<th style="text-align:left;padding-right:15px;">Created By</th>
													<td style="text-align:left">: {{$data->employee->name}}</td>
												</tr> --}}
											</table>
										</div>
									</div>
									<!--------------investigation information---------------->
									<div>
										<table style="width:100%;" border=1>
											<tr>
												<th>Category</th>
												<th>Test Name</th>
												<th>Price</th>
											</tr>
											@foreach($test_d as $t)
											<tr>
												<td>{{$t->test->test_category->name}}</td>
												<td>{{$t->test->name}}</td>
												<td>{{$t->test->price}}</td>
											</tr>
											@endforeach
										</table>
									</div>
									<div style="text-align:center;;margin: 20px 0;">
										---------------------------------- <span style="text-align:center;font-size:20px">Bill Summary</span>------------------------------
									</div>
									<div>
										<table style="text-align:center;width:50%;font-weight:bold;margin:0 auto">
											<tr>
												<td>Total Amount</td>
												<td >:</td>
												<td>Tk. {{$data->total}}</td>
											</tr>
											<tr>
												<td >Vat Amount</td>
												<td>:</td>
												<td >Tk. {{$data->vat}}</td>
											</tr>
											<tr>
												<td>Discount Amount</td>
												<td>:</td>
												<td>Tk. {{$data->discount}}</td>
											</tr>
										</table>
									</div>

									<div style="text-align:center;;margin: 20px 0;">
										---------------------------------- <span style="text-align:center;font-size:20px">Payment Details</span>------------------------------
									</div>

									<div>
										<table style="text-align:center;width:50%;font-weight:bold;margin:0 auto">
											<tr>
												<td>Grand Total</td>
												<td >:</td>
												<td>Tk. {{($data->total+$data->vat)-$data->discount}}</td>
											</tr>
											<tr>
												<td >Paid</td>
												<td>:</td>
												<td >Tk. {{$data->paid}}</td>
											</tr>
											<tr>
												<td>Due</td>
												<td>:</td>
												<td>
													@if($data->paid_status==0)
														Tk. {{($data->total+$data->vat-$data->discount)-$data->paid}}
													@else
														{{"Tk. 0.00"}}
													@endif
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!--/.col (right) -->
		</div>
		<!-- /.row -->
        <script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/jquery.PrintArea.js')}}"></script>
    <script>
        $(document).ready(function(){


            /*for print a page*/
            $('.divPrint').click(function(){
                w=window.open();
                w.document.write($('.printableDiv').html());
                w.print();
                w.close();
            });

        });
    </script>

</main>
@endsection
