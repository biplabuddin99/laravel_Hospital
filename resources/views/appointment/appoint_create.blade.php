@include('layouts.header')

  <!-- ======= Header ======= -->
  @include('layouts.topbar')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.sidebar')
<!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Appointment</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('appoint.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="p_id" class="col-sm-2 col-form-label">Patient Id<span style="color:red">*</span>:</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" id="p_id"/>
					          <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ Request::old('patient_id') }}">

                    
              {{--  @if($errors->has('patient_id'))
                        <span class="text-danger"> 
                          {{ $errors->first('patient_id') }}
                        </span>
                    @endif --}}

                  </div>
                </div>
                <div class="row mb-3">
                  <label for="department" class="col-sm-2 col-form-label">Department Name<span style="color:red">*</span>:</label>
                  <div class="col-sm-10">
                  <select class="form-control"  id="department" name="department">
                    <option value="">Select Department</option>
                    
                         @forelse($department as $dep)
                            <option value="{{$dep->id}}">
                                {{__($dep->name)}}
                            </option>
                          @empty
                            <option value="">No Data Founds</option>
                          @endforelse
                          
                  </select>
                   
                    {{-- @if($errors->has('department'))
                      <span class="text-danger">
                        {{ $errors->first('department') }}
                      </span>
                      @endif --}}
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="doctor" class="col-sm-2 col-form-label">Doctor Name<span style="color:red">* </span>:</label>
                    <div class="col-sm-10">
                    <select class="form-control"  id="doctor" name="doctor_id">
                      <option value=""></option>    
                    </select>
                     
                      {{-- @if($errors->has('doctor_id'))
                        <span class="text-danger">
                          {{ $errors->first('doctor_id') }}
                        </span>
                        @endif --}}
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Phone<span style="color:red">* </span>:</label>
                  <div class="col-sm-10">
                    <input type="text" name="patientPhone" cols="30" class="form-control" id="phone" value="{{ old('patientPhone') }}">

                    {{-- @if($errors->has('patientPhone'))
                    <span class="text-danger">
                        {{ $errors->first('patientPhone')}}
                    </span>
                    @endif --}}

                  </div>
                </div>

                <div class="row mb-3">
                    <label for="problem" class="col-sm-2 col-form-label">Problem:</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="patientProblem" value="" cols="30" class="form-control" id="problem">{{ old('patientProblem') }}</textarea>
   
                      {{-- @if($errors->has('patientProblem'))
                    <span class="text-danger">
                      {{ $errors->first('patientProblem') }}
                    </span>
                    @endif --}}
                  </div>
                </div>
                    
                <div class="row mb-3">
                  <label for="birth_date" class="col-sm-2 col-form-label">Appointment Date<span style="color:red">* </span>:</label>
                  <div class="col-sm-10">
                    <input type="date" name="appoint_date" cols="30" class="form-control" id="datepicker" value="">
                    {{-- {{ date('Y-m-d') }} readonly --}}

                    {{-- @if($errors->has('appoint_date'))
                    <span class="text-danger">
                        {{ $errors->first('appoint_date')}}
                    </span>
                    @endif --}}

                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="serial">Serial No <span style="color:red">* </span>:</label>
                    <div class="col-sm-10" style="display:none;color:red">
                        No Schedule available
                    </div>
                    <div class="col-sm-9 ss">
                      <a class="btn btn-sm btn-success serial" id="serial1">01</a>
                      <a class="btn btn-sm btn-success serial" id="serial2">02</a>
                      <a class="btn btn-sm btn-success serial" id="serial3">03</a>
                      <a class="btn btn-sm btn-success serial" id="serial4">04</a>
                      <a class="btn btn-sm btn-success serial" id="serial5">05</a>
                      <a class="btn btn-sm btn-success serial" id="serial6">06</a>
                      <a class="btn btn-sm btn-success serial" id="serial7">07</a>
                      <a class="btn btn-sm btn-success serial" id="serial8">08</a>
                      <a class="btn btn-sm btn-success serial" id="serial9">09</a>
                      <a class="btn btn-sm btn-success serial" id="serial10">10</a>
                      <input type="hidden" name="serial" id="serial_div" />
                    </div>

                    {{-- @if($errors->has('serial'))
                    <span class="text-danger">
                        {{ $errors->first('serial')}}
                    </span>
                    @endif --}}

                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status:</label>
                    <div class="col-sm-9">
                        <input type="radio" name="approve" value="1" checked> Approve
                        &nbsp;
                        <input type="radio" name="approve" value="2" {{ Request::old('status') == '0' ? 'checked' : '' }}> Not Approve
                    </div>
                </div>
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

  <!-- ======= Footer ======= -->
@include('layouts.footer')
