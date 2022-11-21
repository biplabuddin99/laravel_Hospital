@extends('app')
@section('content')
<main id="main" class="main">
    <section class="section">
		<div class="row">
			<!-- left column -->
            <div class="col-md-12">
                <div class="title">Update Doctor</div>
                <div class="box box-info">
                    <div class="panel panel-default">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif


                        <div class="panel-heading"><a href="{{route('doctor.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Doctor List </a></div>

                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('doctor.update',$doctor->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="fullName">Name <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fullName" name="fullName" value="{{ old('fullName',$doctor->employee->name) }}">
                                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('fullName') }}</div> --}}
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email Address <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email',$doctor->employee->email) }}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('email') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="department">Department <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="department" name="department">
                                        <option value="">-- select department --</option>

                                        @forelse($depart as $dep)
                                            <option value="{{$dep->id}}" {{$doctor->department->id == $dep->id ? 'selected' : ''}}>{{$dep->name}}</option>
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
                                            <option value="{{$des->id}}" {{$doctor->designation->id == $des->id ? 'selected' : ''}}>{{$des->desig_name}}</option>
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
                                    <textarea name="Address" id="Address" cols="30" class="form-control" rows="5">{{old('Address',$doctor->employee->address)}}</textarea>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('Address') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="contact">Phone <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="contact" name="contact" value="{{old('contact',$doctor->employee->phone)}}">
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('contact') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="biography">Biography :</label>
                                <div class="col-sm-9">
                                    <textarea name="biography" id="biography" cols="30" class="form-control" rows="5">{{old('biography',$doctor->biography)}}</textarea>
                                </div>
                                </div>
                                <div class="form-group mt-3">

                                    <div class="col-md-offset-3 col-md-9">
                                        <img src="{{ asset('uploads/employee/'.$doctor->employee->picture) }}" alt="no image" width="150" height="200" style="margin-bottom:20px;" id="img"/>
                                    </div>

                                    <label class="control-label col-sm-3" for="picture">Picture :</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="file" class="form-control-file" name="image" onchange="showMyImage(this)">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="specialist">Specialist :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="specialist" name="specialist" value="{{old('specialist',$doctor->specialist)}}">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                                <div class="col-sm-9">
                                    <div class="input-group date">
                                        <input type="date" class="form-control" name="birthdate" value="{{old('birthdate',$doctor->employee->birth_date)}}">
                                    </div>
                                    <div class="error" style="color:red;font-style:italic;">{{ $errors->first('birthdate') }}</div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="gender">Gender <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="gender" value="1"{{$doctor->employee->gender == '1' ? 'checked' : ''}}> Male
                                        &nbsp;
                                        <input type="radio" name="gender" value="2" {{$doctor->employee->gender == '2' ? 'checked' : ''}}> Female
                                        &nbsp;
                                        <input type="radio" name="gender" value="3" {{$doctor->employee->gender == '3' ? 'checked' : ''}}> Common
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="blood">Blood Group :</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" id="blood" name="blood">
                                        <option value="0" style="display:none" >--  select blood group  --</option>
                                        @forelse($blood as $b)
                                            <option value="{{$b->id}}" {{$doctor->employee->blood->id == $b->id ? 'selected' : ''}}>{{$b['blood_name']}}</option>
                                        @empty
                                            <option>No data found</option>
                                        @endforelse
                                    </select>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="edu">Education :</label>
                                <div class="col-sm-9">
                                    <textarea name="edu" id="edu" cols="30" class="form-control" rows="5">{{old('edu',$doctor->education)}}</textarea>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="fees">Fees :</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fees" name="fees" value="{{old('fees',$doctor->fees)}}">
                                </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="status">Status <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="status" value="1" {{$doctor->status == '1' ? 'checked' : ''}}> Active
                                        &nbsp;
                                        <input type="radio" name="status" value="0" {{$doctor->status == '0' ? 'checked' : ''}}> Inactive
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span class="btn or">or</span>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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

<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script>

	/*==========change image before upload========*/
	 function showMyImage(fileInput) {
			var files = fileInput.files;
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				var imageType = /image.*/;
				if (!file.type.match(imageType)) {
					continue;
				}
				var img=document.getElementById("img");
				img.file = file;
				var reader = new FileReader();
				reader.onload = (function(aImg) {
					return function(e) {
						aImg.src = e.target.result;
					};
				})(img);
				reader.readAsDataURL(file);
			}
		}
	</script>
@endsection
