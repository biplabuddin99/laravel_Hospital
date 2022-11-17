@extends('app')
@section('content')


  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admit Patient</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('patientAdmit.store') }}" method="POST">
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
                  <label for="fname" class="col-sm-2 col-form-label">Father's Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}">
                    @if($errors->has('fname'))
                        <span class="text-danger"> 
                          {{ $errors->first('fname') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="mname" class="col-sm-2 col-form-label">Mother's Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mname" name="mname" value="{{ old('mname') }}">
                    @if($errors->has('mname'))
                        <span class="text-danger"> 
                          {{ $errors->first('mname') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="hname" class="col-sm-2 col-form-label">Husband's Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="hname" name="hname" value="{{ old('hname') }}">
                    @if($errors->has('hname'))
                        <span class="text-danger"> 
                          {{ $errors->first('hname') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="marital" class="col-sm-2 col-form-label">Marital Status:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="marital" name="marital" value="{{ old('marital') }}">
                    @if($errors->has('marital'))
                        <span class="text-danger"> 
                          {{ $errors->first('marital') }}
                        </span>
                    @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="doctor_ref" class="col-sm-2 col-form-label">Reference Doctor:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="doctor_ref" name="doctor_ref" value="{{ old('doctor_ref') }}">
                    @if($errors->has('doctor_ref'))
                        <span class="text-danger"> 
                          {{ $errors->first('doctor_ref') }}
                        </span>
                    @endif
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
                <div class="row mb-3">
                  <label for="admit_date" class="col-sm-2 col-form-label">Admit Date:</label>
                  <div class="col-sm-10">
                    <textarea type="date" name="admit_date" value="" cols="30" class="form-control" id="admit_date">{{ old('admit_date') }}</textarea>
                    @if($errors->has('admit_date'))
                  <span class="text-danger">
                    {{ $errors->first('admit_date') }}
                  </span>
                  @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="guardian" class="col-sm-2 col-form-label">Guardian:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="guardian" value="" cols="30" class="form-control" id="guardian">{{ old('guardian') }}</textarea>
                    @if($errors->has('guardian'))
                  <span class="text-danger">
                    {{ $errors->first('guardian') }}
                  </span>
                  @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="relation" class="col-sm-2 col-form-label">Relation:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="relation" value="" cols="30" class="form-control" id="relation">{{ old('relation') }}</textarea>
                    @if($errors->has('relation'))
                  <span class="text-danger">
                    {{ $errors->first('relation') }}
                  </span>
                  @endif
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="emg_condition" class="col-sm-2 col-form-label">Emergency:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="emg_condition" value="" cols="30" class="form-control" id="emg_condition">{{ old('emg_condition') }}</textarea>
                    @if($errors->has('emg_condition'))
                  <span class="text-danger">
                    {{ $errors->first('emg_condition') }}
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
