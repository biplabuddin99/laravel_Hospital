@extends('app')
@section('content')
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>

                            <div class="col-8 offset-2">
                                <h5 class="m-3 text-success">Update Your Profile</h5>
                                <form class="form-horizontal" action="{{route('userDetails.update',$useredit)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="name">Name <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="FullName" value="{{ old('FullName',$useredit->name)}}">
                                    </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="userEmailAddress">Emaill <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="userEmailAddress" name="userEmailAddress" value="{{old('userEmailAddress',$useredit->email)}}">
                                    </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="add">Address <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <textarea name="FullAddress" id="add" cols="30" class="form-control" rows="3">{{ old('present_add',$useredit->address)}}</textarea>
                                    </div>
                                    </div>

                                    <div class="form-group mt-3">

										<div class="col-md-offset-3 col-md-9">
											<img src="{{ asset('uploads/useredit/'.$useredit->picture) }}" alt="no image" width="150" height="200" style="margin-bottom:20px;" id="img"/>
										</div>

										<label class="control-label col-sm-3" for="picture">Picture :</label>
										<div class="col-sm-9">
											<input type="file" id="file" class="form-control-file" name="image" onchange="showMyImage(this)">
										</div>
									</div>

                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                                    <div class="col-sm-9">
                                        <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate',$useredit->birth_date)}}">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="gender">Gender <span style="color:red">* </span>:</label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="gender" checked value="1"> Male
                                            &nbsp;
                                            <input type="radio" name="gender" value="2" {{old('gender') == '2' ? 'checked' : ''}}> Female
                                            &nbsp;
                                            <input type="radio" name="gender" value="3" {{old('gender') == '3' ? 'checked' : ''}}> Common
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
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

                                    <div class="form-group mt-3">
                                        <label class="control-label col-sm-3" for="status">Status <span style="color:red">* </span>:</label>
                                        <div class="col-sm-9">
                                            <input type="radio" name="status" value="1" {{$useredit->status == '1' ? 'checked' : ''}}> Active
                                            &nbsp;
                                            <input type="radio" name="status" value="0" {{$useredit->status == '0' ? 'checked' : ''}}> Inactive
                                        </div>
                                    </div>

                                    <div class="form-group mt-3">
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
