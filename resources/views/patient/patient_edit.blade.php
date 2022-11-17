@extends('app')
@section('content')
    

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Patient</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('patient.update', $patient->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Patient Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="patientName" value="{{ $patient->name }}">
                    @if($errors->has('patientName'))
                        <span class="text-danger"> 
                          {{ $errors->first('patientName') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="age" class="col-sm-2 col-form-label">Age:</label>
                  <div class="col-sm-10">
                    <input type="text" name="patientAge" cols="30" class="form-control" id="age" value="{{ $patient->age }}">
                    @if($errors->has('patientAge'))
                        <span class="text-danger"> 
                          {{ $errors->first('patientAge') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                  <div class="col-sm-10">
                    <input type="text" name="patientPhone" cols="30" class="form-control" id="phone" value="{{ $patient->phone }}">
                    @if($errors->has('patientPhone'))
                        <span class="text-danger"> 
                          {{ $errors->first('patientPhone') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="birth_date" class="col-sm-2 col-form-label">Date of Birth:</label>
                  <div class="col-sm-10">
                    <input type="date" name="birth_date" cols="30" class="form-control" id="datepicker" value="{{ $patient->dob }}">
                    @if($errors->has('birth_date'))
                        <span class="text-danger"> 
                          {{ $errors->first('birth_date') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
                  <div class="col-sm-10">
                    <input type="radio" value="1" {{ old('patientGender',$patient->gender)=="1" ? "checked":"" }} name="patientGender"> Male
                    &nbsp;
                    <input type="radio" value="2" {{ old('patientGender',$patient->gender)=="2" ? "checked":"" }} name="patientGender"> Female
                    &nbsp;
                    <input type="radio" value="3" {{ old('patientGender',$patient->gender)=="3" ? "checked":"" }} name="patientGender"> Other <br>
                    @if($errors->has('patientGender'))
                    <span class="text-danger">
                      {{ $errors->first('patientGender') }}
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="blood" class="col-sm-2 col-form-label">Blood:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="patientBlood" id="blood">
                      <option value="A+" {{ old('patientBlood', $patient->blood)=="A+" ? "selected":""}}>A+</option>
                      <option value="A-" {{ old('patientBlood', $patient->blood)=="A-" ? "selected":""}}>A-</option>
                      <option value="B+" {{ old('patientBlood', $patient->blood)=="B+" ? "selected":""}}>B+</option>
                      <option value="B-" {{ old('patientBlood', $patient->blood)=="B-" ? "selected":""}}>B-</option>
                      <option value="O+" {{ old('patientBlood', $patient->blood)=="O+" ? "selected":""}}>O+</option>
                      <option value="O-" {{ old('patientBlood', $patient->blood)=="O-" ? "selected":""}}>O-</option>
                      <option value="AB+" {{ old('patientBlood', $patient->blood)=="AB+" ? "selected":""}}>AB+</option>
                      <option value="AB-" {{ old('patientBlood', $patient->blood)=="AB-" ? "selected":""}}>AB-</option>
                    </select>
                    @if($errors->has('patientBlood'))
                  <span class="text-danger">
                    {{ $errors->first('patientBlood') }}
                  </span>
                  @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="address" class="col-sm-2 col-form-label">Address:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="patientAddress" cols="30" class="form-control" id="address" value="">{{ $patient->address }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="problem" class="col-sm-2 col-form-label">Problem:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="patientProblem" cols="30" class="form-control" id="problem" value="">{{ $patient->problem }}</textarea>
                    @if($errors->has('patientProblem'))
                  <span class="text-danger">
                    {{ $errors->first('patientProblem') }}
                  </span>
                  @endif
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <span class="btn or">or</span>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

    </section>

  </main><!-- End #main -->


@endsection
