@extends('app')

@section('content')
  <main id="main" class="main">
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
            <div class="col-md-12">
                <div class="title">Prescription</div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="btn-group">

                                <a href="{{route('prescription.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Prescription List</a>

                                <a class="btn btn-md btn-danger list-btn divPrint"><i class="fa fa-print"></i></a>

                            </div>
                        </div>
                        <div class="panel-body printableDiv">
                            <div  style="margin:20px;">
                                <center style="color: #367FA9;font-weight:bold">
                                    <div>Biplab,Zalal & Tawhid Hospital</div>
                                    <div>2no Gate Nasirabad, Ctg</div>
                                    <div>Hospital.bd@gmail.com</div>
                                    <div>192295465</div>
                                </center>
                                <div style="overflow:hidden;text-transform: capitalize; margin: 20px 0;border-bottom:1px dotted #3A4651;">
                                    <div style="float:left;margin-bottom: 20px;">
                                        <table style="text-align:left">
                                            <tr>
                                                <th style="text-align:left">{{'Dr. '.$pres_show->employee->name}}</th>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:10px;padding-left:0px;text-align:left">{!!$pres_show->doctor->education!!}</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align:left">{{$pres_show->doctor->department->name}}</th>
                                            </tr>
                                            <tr>
                                                <td style="text-align:left">{{$pres_show->doctor->designation->name}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float:right;">
                                        <table style="text-align:right">
                                            <tr>
                                                <th>Date:</th>
                                                <td>{{$data1->created_at->todatestring()}}</td>
                                            </tr>
                                            <tr>
                                                <th>Patient Id:</th>
                                                <td>{{$pres_show->patient->patient_id}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div style="text-transform: capitalize;color: #367FA9;font-weight:bold;margin-bottom:20px;">
                                    <table style="width:100%">
                                        <tr>
                                            <td>Name: {{$pres_show->patient->name}}</td>
                                            <td>Age: {{$pres_show->patient->age}}</td>
                                            <td>Sex: {{$s}}</td>
                                            <td>Problem: {{$pres_show->problem}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="text-transform: capitalize">
                                    <table style="width:100%">
                                        <tr>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>c/c: </th>
                                                        <td>{{$data1->cc}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>INV: </th>
                                                        <td>{{$data1->inv}}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="border-left:1px dotted #000;">
                                                <div style="margin-left:20px">
                                                <div style="text-align:left;font-weight:bold; color: #4F5F6F">Rx:</div>
                                                <div style="text-align:left;font-weight:bold; color: #4F5F6F">Medicine:</div>
                                                <div>
                                                    <table style="width:100%">
                                                        @forelse($medi as $r)
                                                                <tr>
                                                                    <td  style="text-align:center">{{$r['medi_name'].' - '.$r['type']}}</td>
                                                                    <td  style="text-align:center">{{$r['dose']}}</td>
                                                                    <td  style="text-align:center">
                                                                        @if($r['note']==1)
                                                                            {{'After meal '.$r['duration'].' days'}}
                                                                        @else
                                                                            {{'Before meal '.$r['duration'].' days'}}
                                                                        @endif
                                                                        
                                                                    </td>
                                                                </tr>
                                                        @empty
                                                        <td colspan="3" class="text-center">No Medicine</td>
                                                        @endforelse
                                                    </table>
                                                </div>
                                                </div>
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
</section>
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
