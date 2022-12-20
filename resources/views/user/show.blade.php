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
                                                                @if($user->profile_pic == '')
                                                                    <i class="fa fa-user-md" style="font-size:150px;"></i>
                                                                @else
                                                                    <img src="{{ asset('uploads/useredit/'.$user->profile_pic) }}" alt="no image" width="250" height="300"/>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding:20px;font-weight:bold"> {{$user->name}}</td>
                                                        </tr>
                                                    </table>

                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <th class="text-success" style="float:right;"><h3>{{$user->name}}</h3></th>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Email Address</th>
                                                            <td style="text-align:left">{{$user->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Address</th>
                                                            <td style="text-align:left">{{$user->address}}</td>
                                                        </tr>
                                                        {{-- <tr>
                                                            <th style="float:right; padding-right: 40px;">Phone no</th>
                                                            <td style="text-align:left">{{$user->phone}}</td>
                                                        </tr> --}}
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Date of Birth</th>
                                                            <td style="text-align:left">{{$user->birth_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Gender</th>
                                                            <td style="text-align:left">
                                                                @if($user->gender==1)
                                                                    {{"Male"}}
                                                                @elseif($user->gender==2)
                                                                    {{"Female"}}
                                                                @else
                                                                    {{"Common"}}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Blood Group</th>
                                                            <td style="text-align:left">{{$user->blood?->blood_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Created Date</th>
                                                            <td style="text-align:left">{{$user->created_at->format('d M Y')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Updated Date</th>
                                                            <td style="text-align:left">{{$user->updated_at->diffForHumans()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="float:right; padding-right: 40px;">Status</th>
                                                            <td style="text-align:left">
                                                                @if($user->status==1)
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
                        <div>Biplab,Zalal & Tawhid Hospital Limited</div>
                        <div>2no Gate Nasirabad,Chittagong</div>
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
