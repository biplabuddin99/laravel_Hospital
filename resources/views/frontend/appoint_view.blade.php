@extends('frontend.master');
@section('content');
<style type="text/css">
	.print_btn
	{
		font-size: 30px;
		padding-left: 9px;
		padding-right: 1px;
		padding-top: 3px;
		padding-bottom: 2px;
		margin-right: 20px;
		color: #fff;
		border: 2px solid #fff;
		border-radius: 50%;
	}
	.close_btn
	{
		font-size: 30px;
		padding-left: 9px;
		padding-right: 9px;
		padding-top: 2px;
		padding-bottom: 2px;
		margin-right: 20px;
		color: #fff;
		border: 2px solid #fff;
		border-radius: 50%;
	}

</style>
<div class="panel panel-default" id="previewBox" style="height:100%;width:100%;padding:0;margin:0">
    <div class="panel-heading" style="background:#34425C;height: 104px; text-align:center;">
            <div style="margin-top:18px">
                <a href="#" class="print_btn" >
                    <i class="fa fa-print"></i>
                </a>
                <a href="{{ route('welcome.index') }}" class="close_btn">
                    <i class="fa fa-times" ></i>
                </a>
            </div>
    </div>
    <div class="panel panel-default print-body" style="margin:80px;">
        <div style="color: #fff;background-color:#62d0f1; height:150px;padding:30px;overflow:hidden;border:1px solid #62d0f1;">
            <div style="float:left;">
                <table>
                    <tr>
                        <th style="text-align:right">Doctor</th>
                        <td style="text-align:left;padding-left: 20px;">{{$data->employee->name}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">Department</th>
                        <td style="text-align:left;padding-left: 20px;">{{$data->doctor->department->name}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;" >Available Day</th>
                        <td style="text-align:left;padding-left: 20px;">{{$data->schedule->day->name}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">Schedule Time</th>
                        <td style="text-align:left;padding-left: 20px;">{{ date('h:i a',strtotime($data->schedule->shift->start)) }} - {{ date('h:i a',strtotime($data->schedule->shift->end)) }}</td>
                    </tr>
                </table>
            </div>
            <div style="float:right;text-align:right">
                <table>
                    <tr>
                        <th style="text-align:right;">Serial No</th>
                        <td style="text-align:left;padding-left: 20px;">{{'#'.$data->serial}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">Appointment Date</th>
                        <td style="text-align:left;padding-left: 20px;">{{$data->appoint_date}}</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">Fees</th>
                        <td style="text-align:left;padding-left: 20px;">{{'TK.' .$data->doctor->fees}}</td>
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
                            <th style="text-align:right;">Patient Name</th>
                            <td style="text-align:left;padding-left: 20px;">{{$data->patient->name}}</td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Patient Id</th>
                            <td style="text-align:left;padding-left: 20px;">{{$data->patient->patient_id}}</td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Date of Birth</th>
                            <td style="text-align:left;padding-left: 20px;">{{$data->patient->dob}}</td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Gender</th>
                            <td style="text-align:left;padding-left: 20px;">
                                @if($data->patient->gender == 1)
                                    {{'Male'}}
                                @elseif($data->patient->gender == 2)
                                    {{'Female'}}
                                @else
                                    {{'Common'}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Mobile No</th>
                            <td style="text-align:left;padding-left: 20px;">{{$data->patient->phone}}</td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Problem</th>
                            <td style="text-align:left;padding-left: 20px;">{{$data->patient->problem}}</td>
                        </tr>
                        <tr>
                            <th style="text-align:right;">Status</th>
                            <td style="text-align:left;padding-left: 20px;">
                                @if($data->approve == 1)
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
        <div>Demo Hospital Limited</div>
        <div>98 Green Road, Farmgate, Dhaka-1215</div>
        </div>
	</div>
</div>

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
