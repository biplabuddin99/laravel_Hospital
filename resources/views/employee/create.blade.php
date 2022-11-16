@extends('app')
@section('content')
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                    <div class="title">Add New Employee</div>
                    <div class="box box-info">
                        <div class="panel panel-default">


                            <div class="panel-heading">
                                <div class="btn-group">

                                    <a href="{{route('employee.show',2)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Accountant List </a>

                                    <a href="{{route('employee.show',3)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Laboratorist List </a>

                                    <a href="{{route('employee.show',4)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Nurse List </a>

                                    <a href="{{route('employee.show',5)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Reciptionist List </a>

                                </div>
                            </div>


                            <div class="panel-body">


                                <form class="form-horizontal" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="form-group mt-5">
                                        <label class="control-label col-sm-3" for="role">User Role <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" style="width: 100%;" id="role" name="role">
                                             <option value="">-- select role --</option>
                                            @forelse($role as $r)
                                                <option value="{{$r['role_id']}}">{{$r['role']}}</option>
                                            @empty
                                                <option>No data found</option>
                                            @endforelse

                                        </select>
                                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('role') }}</div> --}}
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="fname">First Name <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="fname" value="{{Request::old('fname')}}">
                                            <div class="error" style="color:red;font-style:italic;">{{ $errors->first('fname') }}</div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="present_add">Present Address <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <textarea name="present_add" id="present_add" cols="30" class="form-control" rows="5">{{Request::old('present_add')}}</textarea>
                                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('present_add') }}</div> --}}
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="phone">Phone <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{Request::old('phone')}}">
                                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('phone') }}</div> --}}
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="picture">Picture :</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control-file" name="picture" >
                                            {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('picture') }}</div> --}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control" name="birthdate" value="{{Request::old('birthdate')}}">
                                        </div>
                                        <div class="error" style="color:red;font-style:italic;">{{ $errors->first('birthdate') }}</div>
                                    </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="sex">Sex <span style="color:red">* </span>:</label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="sex" checked value="1"> Male
                                            &nbsp;
                                            <input type="radio" name="sex" value="2" {{Request::old('sex') == '2' ? 'checked' : ''}}> Female
                                            &nbsp;
                                            <input type="radio" name="sex" value="3" {{Request::old('sex') == '3' ? 'checked' : ''}}> Common
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="blood">Blood Group :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2" style="width: 100%;" id="blood" name="blood">
                                            <option value="" selected style="display:none" >--  select blood group  --</option>
                                            @forelse($blood as $b)
                                                <option value="{{$b['blood_id']}}" {{$b['blood_id'] == Request::old('blood') ? 'selected' : ''}}>{{$b['blood_name']}}</option>
                                            @empty
                                                <option>No data found</option>
                                            @endforelse
                                        </select>
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
</main>
@endsection
