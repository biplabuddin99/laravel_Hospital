@extends('app')
@section('content')


<main id="main" class="main">
  
  
  <div class="col-lg-12">
    <h5 class="card-title">birth child</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="panel-heading"><a href="{{route('birth.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Birth Child List </a></div>

             
    <!-- Horizontal Form -->
    <form action="{{ route('birth.update', $birth->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
        <div class="card">
          <div class="card-body m-3">

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">Patient Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="patientName" value="{{ old('patientName', $birth->name) }}" required>
                          </div>
                          <label class="control-label col-sm-4" for="father_name">Father Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $birth->father_name) }}"  required>
                        </div>
                            <label class="control-label col-sm-4" for="mother_name">Mother Name <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $birth->mother_name) }}" required>
                          </div>	
                          <label class="control-label col-sm-4" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" id="birthdate" name="birth_date" value="{{ old('birth_date', $birth->dob) }}">
                          </div>
                          <label class="control-label col-sm-4" for="sex">Gender <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="radio" value="1" {{ $birth->gender=='1' ? 'checked':'' }} name="patientGender"> Male
                            &nbsp;
                            <input type="radio" value="2" {{ $birth->gender=='2' ? 'checked':'' }} name="patientGender"> Female
                            &nbsp;
                            <input type="radio" value="3" {{ $birth->gender=='3' ? 'checked':'' }} name="patientGender"> Other <br>
                          </div>
                        </div>
                    </div>    
     
                        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="address"> Address <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <textarea name="address" id="address" cols="30" class="form-control" rows="5" required>{{ old('address', $birth->address) }}</textarea>
                              </div>
                                <label class="control-label col-sm-4" for="blood">Blood Group <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="blood" name="blood" required>
                                  <option value="">Select Blood Group</option>
                                  <option value="A+"{{ $birth->blood=='A+' ? 'selected':''}}>A+</option>
                                  <option value="A-"{{ $birth->blood=='A-' ? 'selected':''}}>A-</option>
                                  <option value="B+"{{ $birth->blood=='B+' ? 'selected':''}}>B+</option>
                                  <option value="B-"{{ $birth->blood=='B-' ? 'selected':''}}>B-</option>
                                  <option value="O+"{{ $birth->blood=='O+' ? 'selected':''}}>O+</option>
                                  <option value="O-"{{ $birth->blood=='O-' ? 'selected':''}}>O-</option>
                                  <option value="AB+"{{ $birth->blood=='AB+' ? 'selected':''}}>AB+</option>
                                  <option value="AB-"{{ $birth->blood=='AB-' ? 'selected':''}}>AB-</option>
                                </select>
                              </div>
                              <label class="control-label col-sm-4" for="doctor_ref">Doctor Ref. <span style="color:red" >* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="doctor_ref" name="doctor_ref" value="{{ old('doctor_ref') }}" required>
                                  <option>-- select --</option>
                                      @forelse($doctor as $d)
                                        <option value="{{$d->id}}" {{$birth->doctor_id == $d->id ? 'selected' : ''}}>{{$d->employee->name }}</option>
                                      @empty
                                        <option>No data found</option>
                                      @endforelse
                                </select>
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

  