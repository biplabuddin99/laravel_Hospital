@extends('app')
@section('content')


<main id="main" class="main">
  
  
  <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="panel-heading"><a href="{{route('death.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Death Child List </a></div>

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
    <form action="{{ route('death.update', $death->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
        <div class="card">
          <div class="card-body m-3">
            <h3>Death Report Edit</h3><br>

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">Patient Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="patientName" value="{{ old('patientName', $death->name) }}" required>
                          </div>
                          <label class="control-label col-sm-4" for="father_name">Father Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $death->father_name) }}"  required>
                        </div>
                            <label class="control-label col-sm-4" for="mother_name">Mother Name <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $death->mother_name) }}" required>
                          </div>	
                          <label class="control-label col-sm-4" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" id="birthdate" name="birth_date" value="{{ old('birth_date', $death->dob) }}">
                          </div>
                          <label class="control-label col-sm-4" for="sex">Gender <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="radio" value="1" {{ $death->gender=='1' ? 'checked':'' }} name="patientGender"> Male
                            &nbsp;
                            <input type="radio" value="2" {{ $death->gender=='2' ? 'checked':'' }} name="patientGender"> Female
                            &nbsp;
                            <input type="radio" value="3" {{ $death->gender=='3' ? 'checked':'' }} name="patientGender"> Other <br>
                          </div>
                        </div>
                    </div>    
                    
                        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="address"> Address <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <textarea name="address" id="address" cols="30" class="form-control" rows="5" required>{{ old('address', $death->address) }}</textarea>
                              </div>
                                <label class="control-label col-sm-4" for="blood">Blood Group <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="blood" name="blood" required>
                                  <option value="">Select Blood Group</option>
                                  <option value="A+"{{ $death->blood=='A+' ? 'selected':''}}>A+</option>
                                  <option value="A-"{{ $death->blood=='A-' ? 'selected':''}}>A-</option>
                                  <option value="B+"{{ $death->blood=='B+' ? 'selected':''}}>B+</option>
                                  <option value="B-"{{ $death->blood=='B-' ? 'selected':''}}>B-</option>
                                  <option value="O+"{{ $death->blood=='O+' ? 'selected':''}}>O+</option>
                                  <option value="O-"{{ $death->blood=='O-' ? 'selected':''}}>O-</option>
                                  <option value="AB+"{{ $death->blood=='AB+' ? 'selected':''}}>AB+</option>
                                  <option value="AB-"{{ $death->blood=='AB-' ? 'selected':''}}>AB-</option>
                                </select>
                              </div>
                              <label class="control-label col-sm-4" for="doctor_ref">Doctor Ref. <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="doctor_ref" name="doctor_ref" value="{{ old('doctor_ref', $death->doctor_ref) }}" required>
                                  </div>
                        </div>
                    </div>
                  </div>
                  <br>
                              <label class="col-sm-1">Status<span style="color:red" >* </span> :</label>
                                <input type="radio" value="1" name="status" checked> Active
                                &nbsp;
                                <input type="radio" value="0" name="status"> Inactive

                  <br>     <br>



                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <span class="btn or">or</span>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
              </div>
            </div>


                           

      </form><!-- End Horizontal Form -->
    </main><!-- End #main -->
 
    
  @endsection

  