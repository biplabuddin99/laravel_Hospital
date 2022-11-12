@include('layouts.header')

  <!-- ======= Header ======= -->
  @include('layouts.topbar')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.sidebar')
<!-- End Sidebar-->

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
                    <input type="text" class="form-control" id="name" name="p_name" value="{{ $patient->name }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="age" class="col-sm-2 col-form-label">Age:</label>
                  <div class="col-sm-10">
                    <input type="text" name="p_age" cols="30" class="form-control" id="age" value="{{ $patient->age }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Phone:</label>
                  <div class="col-sm-10">
                    <input type="text" name="p_phone" cols="30" class="form-control" id="phone" value="{{ $patient->phone }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gender" class="col-sm-2 col-form-label">Gender:</label>
                  <div class="col-sm-10">
                    <input type="radio" value="1" {{ old('p_gender',$patient->gender)=="1" ? "checked":"" }} name="p_gender"> Male
                    &nbsp;
                    <input type="radio" value="2" {{ old('p_gender',$patient->gender)=="2" ? "checked":"" }} name="p_gender"> Female
                    &nbsp;
                    <input type="radio" value="3" {{ old('p_gender',$patient->gender)=="3" ? "checked":"" }} name="p_gender"> Other
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="blood" class="col-sm-2 col-form-label">Blood:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="p_blood" id="blood">
                      <option value="A+" {{ old('p_blood', $patient->blood)=="A+" ? "selected":""}}>A+</option>
                      <option value="A-" {{ old('p_blood', $patient->blood)=="A-" ? "selected":""}}>A-</option>
                      <option value="B+" {{ old('p_blood', $patient->blood)=="B+" ? "selected":""}}>B+</option>
                      <option value="B-" {{ old('p_blood', $patient->blood)=="B-" ? "selected":""}}>B-</option>
                      <option value="O+" {{ old('p_blood', $patient->blood)=="O+" ? "selected":""}}>O+</option>
                      <option value="O-" {{ old('p_blood', $patient->blood)=="O-" ? "selected":""}}>O-</option>
                      <option value="AB+" {{ old('p_blood', $patient->blood)=="AB+" ? "selected":""}}>AB+</option>
                      <option value="AB-" {{ old('p_blood', $patient->blood)=="AB-" ? "selected":""}}>AB-</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="address" class="col-sm-2 col-form-label">Address:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="p_address" cols="30" class="form-control" id="address" value="">{{ $patient->address }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="problem" class="col-sm-2 col-form-label">Problem:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="p_problem" cols="30" class="form-control" id="problem" value="">{{ $patient->problem }}</textarea>
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
                  <button type="submit" class="btn btn-primary">Update</button>
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
