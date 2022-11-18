@extends('app')
@section('content')
<main id="main" class="main">
    <section class="section">
		<div class="row">
			<!-- left column -->
            <div class="col-md-12">
                <div class="title">Add New Doctor</div>
                <div class="box box-info">
                    <div class="panel panel-default">


                        <div class="panel-heading"><a href="{{route('doctor.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Doctor List </a></div>


                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="fullName">Name <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fullName" name="fullName" value="{{ old('fullName') }}">
                                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('fullName') }}</div> --}}
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email Address <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="{{Request::old('email')}}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('email') }}</div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="department">Department <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="department" name="department">
                                        <option value="">-- select department --</option>

                                        @forelse($depart as $dep)
                                            <option value="{{$dep['department_id']}}" {{$dep['department_id'] == Request::old('department') ? 'selected' : ''}}>{{$dep['dep_name']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse

                                    </select>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('department') }}</div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="designation">Designation <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="designation">
                                        <option value="">-- select designation --</option>
                                        @forelse($deg as $des)
                                            <option value="{{$des['designation_id']}}" {{$des['designation_id'] == Request::old('designation') ? 'selected' : ''}}>{{$des['desig_name']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse
                                    </select>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('designation') }}</div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="present_add">Present Address <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <textarea name="present_add" id="present_add" cols="30" class="form-control" rows="5">{{Request::old('present_add')}}</textarea>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('present_add') }}</div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="permanent_add">Permanent Address :</label>
                                <div class="col-sm-9">
                                    <textarea name="permanent_add" id="permanent_add" cols="30" class="form-control" rows="5">{{Request::old('permanent_add')}}</textarea>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="phone">Phone <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{Request::old('phone')}}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('phone') }}</div>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="biography">Biography :</label>
                                <div class="col-sm-9">
                                    <textarea name="biography" id="biography" cols="30" class="form-control" rows="5">{{Request::old('biography')}}</textarea>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="picture">Picture :</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control-file" name="picture" >
                                        <div class="error" style="color:red;font-style:italic;">{{ $errors->first('picture') }}</div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="specialist">Specialist :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="specialist" name="specialist" value="{{Request::old('specialist')}}">
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="datepicker" name="birthdate" value="{{Request::old('birthdate')}}">
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
                                        <option value="0" style="display:none" >--  select blood group  --</option>
                                        @forelse($blood as $b)
                                            <option value="{{$b['id']}}" {{$b['id'] == Request::old('blood') ? 'selected' : ''}}>{{$b['blood_name']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse
                                    </select>
                                </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="edu">Education :</label>
                                <div class="col-sm-9">
                                    <textarea name="edu" id="edu" cols="30" class="form-control" rows="5">{{Request::old('edu')}}</textarea>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="fees">Fees :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fees" name="fees" value="{{Request::old('specialist')}}">
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


<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>

<!-- bootstrap datepicker -->
<script type="text/javascript" src="{{asset('public/assets/js/bootstrap-datepicker.min.js')}}"></script>
<!-- CK Editor -->
<script type="text/javascript" src="{{asset('public/assets/js/ckeditor/ckeditor.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
<!-- Page script -->
<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('biography');
    CKEDITOR.replace('edu');

    //Date picker
    $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    })
</script>
@endsection
