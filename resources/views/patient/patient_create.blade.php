@extends('app')
@section('content')
    

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Patient</h5>


              <div class="panel-heading"><a href="{{route('patient.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Patient List </a></div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <br>

              <!-- Horizontal Form -->
              <form action="{{ route('patient.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Patient Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="patientName" value="{{ old('patientName') }}">
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
                    <input type="text" name="patientAge" cols="30" class="form-control" id="age" value="{{ old('patientAge') }}">
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
                    <input type="text" name="patientPhone" cols="30" class="form-control" id="phone" value="{{ old('patientPhone') }}">
                    @if($errors->has('patientPhone'))
                    <span class="text-danger">
                        {{ $errors->first('patientPhone')}}
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="birth_date" class="col-sm-2 col-form-label">Date of Birth:</label>
                  <div class="col-sm-10">
                    <input type="date" name="birth_date" cols="30" class="form-control" id="datepicker" value="{{ old('birth_date') }}">
                    @if($errors->has('birth_date'))
                    <span class="text-danger">
                        {{ $errors->first('birth_date')}}
                    </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
                  <div class="col-sm-10">
                    <input type="radio" value="1" {{ old('patientGender')=='1' ? 'checked':'' }} name="patientGender"> Male
                    &nbsp;
                    <input type="radio" value="2" {{ old('patientGender')=='2' ? 'checked':'' }} name="patientGender"> Female
                    &nbsp;
                    <input type="radio" value="3" {{ old('patientGender')=='3' ? 'checked':'' }} name="patientGender"> Other <br>
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
                      <option value="">Select Blood Group</option>
                      <option value="A+" {{ old('patientBlood')=='A+' ? 'selected':''}}>A+</option>
                      <option value="A-"{{ old('patientBlood')=='A-' ? 'selected':''}}>A-</option>
                      <option value="B+"{{ old('patientBlood')=='B+' ? 'selected':''}}>B+</option>
                      <option value="B-"{{ old('patientBlood')=='B-' ? 'selected':''}}>B-</option>
                      <option value="O+"{{ old('patientBlood')=='O+' ? 'selected':''}}>O+</option>
                      <option value="O-"{{ old('patientBlood')=='O-' ? 'selected':''}}>O-</option>
                      <option value="AB+"{{ old('patientBlood')=='AB+' ? 'selected':''}}>AB+</option>
                      <option value="AB-"{{ old('patientBlood')=='AB-' ? 'selected':''}}>AB-</option>
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
                    <textarea type="text" name="patientAddress" cols="30" class="form-control" id="address">{{ old('patientAddress') }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="problem" class="col-sm-2 col-form-label">Problem:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="patientProblem" value="" cols="30" class="form-control" id="problem">{{ old('patientProblem') }}</textarea>
                    @if($errors->has('patientProblem'))
                  <span class="text-danger">
                    {{ $errors->first('patientProblem') }}
                  </span>
                  @endif
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
          </div>

    </section>

  </main><!-- End #main -->

  
@endsection