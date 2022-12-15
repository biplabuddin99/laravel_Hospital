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
  <div class="panel-body">
		<div style="text-align:center;margin-top:30px;">
			<p style="font-size: 36px;font-weight:bold;color:#207fdd">Doctor Information</p>
			<center style="margin-top: 50px;">

                <table>
                    <tr>
                        <td style="padding-right: 100px;">
                            <table>
                                <tr>
                                    <td>
                                        @if($doctor->employee->picture == '')
                                            <i class="fa fa-user-md" style="font-size:150px;"></i>
                                        @else
                                            <img src="{{ asset('uploads/employee/'.$doctor->employee->picture) }}" alt="no image" width="250" height="300"/>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:20px;font-weight:bold">Dr.{{ $doctor->employee->name }}</td>
                                </tr>
                            </table>

                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Email Address</th>
                                    <td style="text-align:left">{{ $doctor->employee->email }}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Department</th>
                                    <td style="text-align:left">{{ $doctor->department->name }}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Designation</th>
                                    <td style="text-align:left">{{ $doctor->designation->desig_name }}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Address</th>
                                    <td style="text-align:left">{{ $doctor->employee->address }}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Phone no</th>
                                    <td style="text-align:left">{{ $doctor->employee->phone }}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Short Biography</th>
                                    <td style="text-align:left">{!! $doctor->biography !!}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Date of Birth</th>
                                    <td style="text-align:left">{{$doctor->employee->birth_date}}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Specialist</th>
                                    <td style="text-align:left">{{$doctor->specialist}}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Gender</th>
                                    <td style="text-align:left">
                                        @if($doctor->employee->gender==1)
                                            {{"Male"}}
                                        @elseif($doctor->employee->gender==2)
                                            {{"Female"}}
                                        @else
                                            {{"Common"}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Blood Group</th>
                                    <td style="text-align:left">{{$doctor->employee->blood->blood_name}}</td>
                                </tr>
                                <tr >
                                    <th style="float:right; padding-right: 40px;text-align:right">Education</th>
                                    <td style="text-align:left">{!! $doctor->education !!}</td>
                                </tr>
                                <tr >
                                    <th style="float:right; padding-right: 40px;text-align:right">Fees</th>
                                    <td style="text-align:left">TK.{!! $doctor->fees !!}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Created Date</th>
                                    <td style="text-align:left">{{$doctor->created_at->format('d M Y')}}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Updated Date</th>
                                    <td style="text-align:left">{{$doctor->updated_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th style="float:right; padding-right: 40px;text-align:right">Status</th>
                                    <td style="text-align:left">
                                        @if($doctor->status==1)
                                            {{"Active"}}
                                        @else
                                            {{"Inactive"}}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
			</center>
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
			w.document.write($('.panel-body').html());
			w.print();
			w.close();
		});

	 });
</script>

@endsection
