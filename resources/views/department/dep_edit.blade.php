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
              <h5 class="card-title">Edit Department</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('department.update',$department->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Department Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="{{ $department->name }}" name="dep_name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="description" class="col-sm-2 col-form-label">Description:</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="dep_description" cols="30" class="form-control" rows="5" id="description">{{ $department->description }}</textarea>
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

  <!-- ======= Footer ======= -->
@include('layouts.footer')
