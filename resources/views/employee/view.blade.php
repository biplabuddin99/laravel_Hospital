@extends('app')
@section('content')
<main id="main" class="main">

    <section class="content">
        <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                    <div class="title">Profile</div>
                    <div class="box box-info">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="height:100px;">

                            </div>
                            <div class="print-body">
                            <div class="panel-body">
                                <div style="text-align:center;margin-top:30px;">
                                    <p style="font-size: 30px;font-weight:bold;color:#207fdd">Profile Information</p>
                                    <center style="margin-top: 50px;margin-bottom:50px;">

                                        <table>
                                            <tr>
                                                <td style="padding-right: 100px;">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                @if($data->picture == '')
                                                                    <i class="fa fa-user-md" style="font-size:150px;"></i>
                                                                @else
                                                                    <img src="{{ URL::asset('public/images/'.$data->picture) }}" alt="no image" width="250" height="300"/>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:20px;font-weight:bold"> {{$data->name}}</td>
                                                        </tr>
                                                    </table>

                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Email Address</th>
                                                            <td style="text-align:left">{{$data->user_func[0]->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Address</th>
                                                            <td style="text-align:left">{{$data->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Phone no</th>
                                                            <td style="text-align:left">{{$data->phone}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Date of Birth</th>
                                                            <td style="text-align:left">{{$data->birth_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Gender</th>
                                                            <td style="text-align:left">
                                                                @if($data->gender==1)
                                                                    {{"Male"}}
                                                                @elseif($data->gender==2)
                                                                    {{"Female"}}
                                                                @else
                                                                    {{"Common"}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Blood Group</th>
                                                            <td style="text-align:left">{{$data->blood->blood_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Created Date</th>
                                                            <td style="text-align:left">{{$data->created_at}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Updated Date</th>
                                                            <td style="text-align:left">{{$data->updated_at}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Status</th>
                                                            <td style="text-align:left">
                                                                @if($data->status==1)
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
                        <div style="text-align:center;border-top:1px solid #e5e9ea;padding:20px;" class="panel-footer">
                        <div>Demo Hospital Limited</div>
                        <div>98 Green Road, Farmgate, Dhaka-1215</div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
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
