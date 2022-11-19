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
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('email') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="department">Department <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="department" name="department">
                                        <option value="">-- select department --</option>

                                        @forelse($depart as $dep)
                                            <option value="{{$dep->id}}" {{$dep->id == old('department') ? 'selected' : ''}}>{{$dep->name}}</option>
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
                                            <option value="{{$des->id}}" {{$des->id == old('designation') ? 'selected' : ''}}>{{$des->desig_name}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse
                                    </select>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('designation') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Address"> Address <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <textarea name="Address" id="Address" cols="30" class="form-control" rows="5">{{old('Address')}}</textarea>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('Address') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="contact">Phone <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact')}}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('contact') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="biography">Biography :</label>
                                <div class="col-sm-9">
                                    <textarea name="biography" id="biography" cols="30" class="form-control" rows="5">{{old('biography')}}</textarea>
                                </div>
                                </div>
                                {{-- <div class="form-group mt-3">
                                    <label class="control-label col-sm-3" for="image">Picture :</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control-file" name="image" >
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label class="control-label col-sm-3" for="image">Image :</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control-file" name="image" >
                                        <div class="error" style="color:red;font-style:italic;">{{ $errors->first('image') }}</div>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="specialist">Specialist :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="specialist" name="specialist" value="{{old('specialist')}}">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <div class="input-group date">
                                        <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}">
                                    </div>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('birthdate') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="gender">Gender <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="gender" checked value="1"> Male
                                        &nbsp;
                                        <input type="radio" name="gender" value="2" {{old('gender') == '2' ? 'checked' : ''}}> Female
                                        &nbsp;
                                        <input type="radio" name="gender" value="3" {{old('gender') == '3' ? 'checked' : ''}}> Common
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="blood">Blood Group :</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="blood" name="blood">
                                        <option value="0" style="display:none" >--  select blood group  --</option>
                                        @forelse($blood as $b)
                                            <option value="{{$b->id}}" {{$b->id == Request::old('blood') ? 'selected' : ''}}>{{$b['blood_name']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse
                                    </select>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="edu">Education :</label>
                                <div class="col-sm-9">
                                    <textarea name="edu" id="edu" cols="30" class="form-control" rows="5">{{old('edu')}}</textarea>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="fees">Fees :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fees" name="fees" value="{{old('specialist')}}">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="status">Status <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="status" value="1" checked> Active
                                        &nbsp;
                                        <input type="radio" name="status" value="0" {{old('status') == '0' ? 'checked' : ''}}> Inactive
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
<script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<!-- Page script -->
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'biography' );
    CKEDITOR.replace( 'edu' );
</script>
@endsection
