@extends('app')
@section('title','Shift')

@section('content')
<main id="main" class="main">
    <section class="content">
    <div class="row">
        <!-- left column -->
            <div class="col-md-12">
                <div class="title">Add Schedule</div>
                <div class="box box-info">
                    <div class="panel panel-default">

                        <div class="panel-heading mb-3">
                            <a href="{{route('schedule.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Schedule List </a>
                        </div>

                        <div class="panel-body">

                            <form class="form-horizontal" action="{{route('schedule.store')}}" method="post">
                                @csrf
                                @method('post')

                            {{-- <input type="hidden" name="_token" value="{{Session::token()}}" /> --}}


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="role">User Role <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="role" name="role">
                                      <option value="">-- select role --</option>

                                        @forelse($role as $r)
                                            <option value="{{$r['id']}}" {{$r['id'] == Request::old('role') ? 'selected' : ''}}>{{$r['role']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse

                                    </select>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('role') }}</div>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="u_name">User Name <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="u_name" name="u_name">
                                        <option value="">-- select user --</option>
                                    </select>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('u_name') }}</div>
                                  </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="time">Available day & time<span style="color:red">* </span> :</label>
                                <div class="col-sm-9">
                                    <div class="input-group col-md-5" style="float:left;padding-right:15px">
                                        <select class="form-control select2" id="day_id">
                                            <option value="0">-- select day --</option>

                                            @forelse($day as $d)
                                                <option value="{{$d['day_id']}}" {{$d['day_id'] == Request::old('day_id') ? 'selected' : ''}}>{{$d['day_name']}}</option>
                                            @empty
                                                <option>No data found</option>
                                            @endforelse

                                        </select>

                                        <div class="error" style="color:red;font-style:italic;">{{ $errors->first('day_id') }}</div>
                                    </div>
                                    <div class="input-group  col-md-5" style="float:left;padding-left:15px">
                                        <select class="form-control select2" id="shift_id">
                                            <option value="0">-- select time --</option>

                                            @forelse($shift as $s)
                                                <option value="{{$s['shift_id']}}" {{$s['shift_id'] == Request::old('shift_id') ? 'selected' : ''}}>{{$s['s_name']  .' ['.$s['start']. ' to ' .$s['end_time'].']'}}</option>
                                            @empty
                                                <option>No data found</option>
                                            @endforelse


                                        </select>

                                        <div class="error" style="color:red;font-style:italic;">{{ $errors->first('shift_id') }}</div>

                                    </div>
                                    <div class="col-md-2" style="float:left;">
                                        <a class="btn btn-sm btn-success add">add</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="add_row">
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="status">Status <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="status" value="1" checked> Active
                                        &nbsp;
                                        <input type="radio" name="status" value="0" {{Request::old('status') == '0' ? 'checked' : ''}}> Inactive
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9 change-btn">
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
<!-- jQuery 3 -->
<script type="text/javascript"  src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#role').on('change', function(){
            //console.log('this is change');
            var role_id = $(this).val();
            var div = $(this).parent();
            var op = '';
            $.ajax({

                type:'get',
                url:'{!!URL::to('schedule/show')!!}',
                data:{'id':role_id},

                success:function(data){
                    //console.log('success');
                    //console.log(data);

                     op+= "<option value='0' selected disabled>-- select name --</option>";

                    for(var i=0;i<data.length;i++)
                    {
                        op += '<option value="'+data[i].employ_id+'">'+data[i].first_name+ ' ' +data[i].last_name+'</option>';
                    }

                    $('#u_name').html('');
                    $('#u_name').append(op);
                }
            });

        });

        /*append row in table for schedule list*/


        $('.add').click(function(){


            div = "<tr><td>"+"<input type='hidden' name='day_id[]' id='day_arr' value='"+$('#day_id option:selected').val()+"'><i class='fa fa-calendar'></i> "+$('#day_id option:selected').text()+"</td><td><input type='hidden' name='shift_id[]' value='"+$('#shift_id option:selected').val()+"'>"+$('#shift_id option:selected').text()+"</td><td>"+"<i class='fa fa-times btn btn-sm btn-default dlt' style='color:red;'></i>"+"</td></tr>";

            $('table').append(div);
        });

        $(document).on('click', '.dlt', function(){
            $(this).parent('td').parent('tr').remove();
        });


});
</script>
</main>
@endsection
