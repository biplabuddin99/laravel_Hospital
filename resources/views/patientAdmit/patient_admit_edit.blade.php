@extends('app')
@section('content')


<main id="main" class="main">
  
  
  <div class="col-lg-12">
    <h5 class="card-title">Admit Patient</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="panel-heading"><a href="{{route('patientAdmit.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Admitted Patient List </a></div>
              <!-- ======= Patient ID Modal ======== -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Patient Id</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <div class="col-md-12 ">
                            <label class="control-label col-md-3 " for="patient_id">Patient ID<span style="color:red" >* </span>:</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Search Patient">
                              <span class="">
                                
                              </span>
                            </div>
                            <button class="btn btn-secondary" id="search_p" type="button" data-dismiss="modal">Search Patient</button>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <div class="form-group mb-3 d-grid justify-content-end">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <i class="fa fa-search-plus" style="padding-right:10px;"></i>Search Patient ID</button>
                </div>
          </div>


    <!-- Horizontal Form -->
    <form action="{{ route('patientAdmit.update',$pAdmit->admit_id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
        <div class="card">
          <div class="card-body m-2">

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">Patient Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="patientName" value="{{ old('patientName',$pAdmit->name) }}" required>
                          </div>
                            <label class="control-label col-sm-4" for="email">Email<span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$pAdmit->email) }}" >
                          </div>
                            <label class="control-label col-sm-4" for="phone">Phone <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $pAdmit->phone) }}" required>
                          </div><br>
                          <label class="control-label col-sm-4" for="picture">Picture :</label>
                          
                          <div class="col-md-offset-3 col-md-9">
                            <img src="{{ asset('uploads/patientAdmit/'.$pAdmit->picture) }}" alt="no image" width="150" height="200" style="margin-bottom:20px;" id="img"/>
                          </div>
                          <div class="col-sm-8">
                            <input type="file" class="form-control-file" id="picture" name="picture">
                          </div><br>
                          <label class="control-label col-sm-4" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" id="birthdate" name="birth_date" value="{{ old('birth_date', $pAdmit->dob) }}">
                          </div><br>
                          <label class="control-label col-sm-4" for="sex">Gender <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="radio" value="1" {{ $pAdmit->gender=='1' ? 'checked':'' }} name="patientGender"> Male
                            &nbsp;
                            <input type="radio" value="2" {{ $pAdmit->gender=='2' ? 'checked':'' }} name="patientGender"> Female
                            &nbsp;
                            <input type="radio" value="3" {{ $pAdmit->gender=='3' ? 'checked':'' }} name="patientGender"> Other <br>
                          </div>
                        </div>
                    </div>    
     
                        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="present_add">Present Address <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <textarea name="present_address" id="present_add" cols="30" class="form-control" rows="5" required>{{ old('present_address', $pAdmit->present_add) }}</textarea>
                              </div>
                            <label class="control-label" for="permanent_add">Permanent Address <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <textarea name="permanent_address" id="permanent_address" cols="30" class="form-control" rows="5" required>{{ old('permanent_address', $pAdmit->permanent_add) }}</textarea>
                              </div>
                                <label class="control-label col-sm-4" for="blood">Blood Group <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="blood" name="blood" required>
                                  <option value="A+" {{ $pAdmit->blood=="A+" ? "selected":""}}>A+</option>
                                  <option value="A-" {{ $pAdmit->blood=="A-" ? "selected":""}}>A-</option>
                                  <option value="B+" {{ $pAdmit->blood=="B+" ? "selected":""}}>B+</option>
                                  <option value="B-" {{ $pAdmit->blood=="B-" ? "selected":""}}>B-</option>
                                  <option value="O+" {{ $pAdmit->blood=="O+" ? "selected":""}}>O+</option>
                                  <option value="O-" {{ $pAdmit->blood=="O-" ? "selected":""}}>O-</option>
                                  <option value="AB+" {{ $pAdmit->blood=="AB+" ? "selected":""}}>AB+</option>
                                  <option value="AB-" {{ $pAdmit->blood=="AB-" ? "selected":""}}>AB-</option>
                                </select>
                              </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
                      <!--########### Patient admit inforMation ############### -->
                  


                <div class="panel-heading"><h4>Patient Admit Information</h4></div>


                    <div class="card">
                      <div class="card-body m-2">
                        <div class="row">
                          <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                    <label class="control-label col-sm-4" for="admit_date">Date of Admit <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="date" class="form-control" id="admit_date" name="admit_date" value="{{ old('admit_date', $pAdmit->admit_date) }}">
                                  </div>
                                    <label class="control-label col-sm-4" for="father_name">Father Name <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $pAdmit->father_name) }}"  required>
                                </div>
                                    <label class="control-label col-sm-4" for="mother_name">Mother Name <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $pAdmit->mother_name) }}"  required>
                                  </div>	
                                    <label class="control-label col-sm-4" for="husband_name">Husband Name :</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="husband_name" name="husband_name" value="{{ old('husband_name', $pAdmit->husband_name) }}">
                                  </div>	
                                    <label class="control-label col-sm-4" for="doctor_id">Doctor Ref. <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id', $pAdmit->doctor_id) }}" required>
                                  </div>
                                  <label class="control-label col-sm-4" for="guardian_name">Guardian Name :</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $pAdmit->guardian) }}">
                                </div>
                                </div>
                              </div>
                              
                              
                          <div class="col-md-6 sm-6">
                                <label class="control-label col-sm-4" for="marital_status">Marital Status <span style="color:red">* </span>:</label>
                                <div class="col-sm-8">
                                  <input type="radio" name="marital_status" value="1" {{ $pAdmit->marital_status=='1' ? 'checked':'' }}> Married
                                  &nbsp;
                                  <input type="radio" name="marital_status" value="2" {{ $pAdmit->marital_status=='2' ? 'checked':'' }}> Unmarried
                                </div>
                                    <label class="control-label col-sm-4" for="relation">Relation <span style="color:red" > </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="relation" name="relation" value="{{ old('relation', $pAdmit->relation) }}">
                                  </div>
                                    <label class="control-label" for="problem">Patient Problem <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <textarea name="problem" id="problem" class="form-control"required>{{ old('problem', $pAdmit->problem) }}</textarea>
                                  </div>
                                    <label class="control-label col-sm-4" for="room_cat">Room Category <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="room_cat_id" name="room_cat_id" required>
                                      <option>-- select --</option>
                                    {{-- @foreach($room_cat as $rc)
                                      <option value="{{$rc->room_cat_id}}">{{$rc->room_cat_name}}</option>
                                    @endforeach --}}
                                    
                                    </select>
                                  </div>
                                    <label class="control-label col-sm-4" for="room_no">Room No <span style="color:red"></span>:</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="room_no" name="room_no" required>
                                      <option>-- select --</option>
                                    </select>
                                  </div><br>
                                  <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo" >Patient in Emergency</button>	
                                  <div id="demo" class="collapse">
                                    <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2">
                                      <textarea name="patient_emrg" id="patient_emrg" cols="30" class="form-control" rows="2" ></textarea>
                                    </div>
                                  </div>
                          </div>	
                        </div>
                          
                           
                            <fieldset class="row mb-3">
                              <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                              <div class="col-sm-10">
                                <input type="radio" value="1" name="status" checked> Active
                                &nbsp;
                                <input type="radio" value="0" name="status"> Inactive
                              </div>
                            </fieldset>
                      </div>
                    </div>

                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <span class="btn or">or</span>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
      </form><!-- End Horizontal Form -->
    </main><!-- End #main -->
 
    
  @endsection
  <script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
  <script>
  
    /*==========change image before upload========*/
     function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var imageType = /picture.*/;
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

