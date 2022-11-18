@extends('app')
@section('content')


  <main id="main" class="main">

        <div class="col-lg-12">
          <h5 class="card-title">Admit Patient</h5>

          <!-- Horizontal Form -->
          <form action="{{ route('patientAdmit.store') }}" method="POST">
            @csrf
              <div class="mb-3 d-grid justify-content-end">
                <button type="button" class="btn btn-primary margin-right"><i class="fa fa-search-plus" style="padding-right:5px;"></i>Search Patient ID</button>
              </div>
        </div>

                <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="first_name">First Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="fname" name="first_name" value="{{ Request::old('first_name') }}" required>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="last_name">Last Name <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="lname" name="last_name" value="{{ Request::old('last_name') }}" required>
                          </div>	
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="email">Email<span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ Request::old('email') }}" >
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="phone">Phone <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ Request::old('phone') }}" required>
                          </div>
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="present_add">Present Address <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <textarea name="present_address" id="present_add" cols="30" class="form-control" rows="5" required></textarea>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="permanent_add">Permanent Address <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <textarea name="permanent_address" id="permanent_address" cols="30" class="form-control" rows="5" required></textarea>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="picture">Picture :</label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control-file" id="picture" name="picture">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" id="birthdate" name="birth_date">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="sex">Sex <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="radio" name="sex" value="1" checked id="m"> Male
                            &nbsp;
                            <input type="radio" name="sex" value="2" id="f"> Female
                            &nbsp;
                            <input type="radio" name="sex" value="3" id="c"> Common
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label col-sm-4" for="blood">Blood Group <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="blood" name="blood" required>
                              <option>-- select --</option>
                            {{-- @foreach($bl as $b) 
                              <option value="{{$b->blood_id}}">{{$b->blood_name}}</option>
                            @endforeach --}}
                            </select>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                      
                      <!--########### Patient admit inforMation ############### -->
                  
                      <div class="panel-group" style="">
                        <div class="panel panel-default">
                          <div class="panel-heading"><h4>Patient Admit Information</h4></div>


                    <div class="card">
                      <div class="card-body">
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="admit_date">Date of Admit <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="date" class="form-control" id="admit_date" name="admit_date">
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="marital_status">Marital Status <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="radio" name="marital_status" value="1"> Married
                                    &nbsp;
                                    <input type="radio" name="marital_status" value="2"> Unmarried
                                  </div>
                                </div>
                              </div>
                              
                              
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="father_name">Father Name <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="father_name" name="father_name"  required>
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="mother_name">Mother Name <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="mother_name" name="mother_name"  required>
                                  </div>	
                                </div>
                              </div>
                              
                              
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="hous_name">Husband Name :</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="hous_name" name="hous_name">
                                  </div>	
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="doctor_ref">Doctor Ref. <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="doctor_ref" name="doctor_ref" required>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="gurdian_name">Gurdian Name :</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="gurdian_name" name="gurdian_name" >
                                  </div>	
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="relation">Relation <span style="color:red" > </span>:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="relation" name="relation" >
                                  </div>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2" for="problem">Patient Problem <span style="color:red">* </span>:</label>
                                  <div class="col-sm-10">
                                    <textarea name="problem" id="problem" cols="30" class="form-control" rows="2" required></textarea>
                                  </div>
                                </div>
                              </div>
                              
                              
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="room_cat">Room Category <span style="color:red">* </span>:</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="room_cat_id" name="room_cat_id" required>
                                      <option>-- select --</option>
                                    {{-- @foreach($room_cat as $rc)
                                      <option value="{{$rc->room_cat_id}}">{{$rc->room_cat_name}}</option>
                                    @endforeach --}}
                                    
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label col-sm-4" for="room_no">Room No <span style="color:red"></span>:</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" id="room_no" name="room_no" required>
                                      <option>-- select --</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="">
                                  <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo" style="margin-left:188px;">Patient in Emergency</button>	
                                
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
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <span class="btn or">or</span>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                          </form><!-- End Horizontal Form -->

                      </div>



  </main><!-- End #main -->
 
    
  @endsection


  