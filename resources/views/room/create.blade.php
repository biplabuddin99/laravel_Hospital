@extends('app')
@section('content')
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Room Category</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('roomCategory.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Room Category Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="roomCategoryName">
                    {{-- @if($errors->has('roomCategoryName'))
                      <span class="text-danger"> {{ $errors->first('roomCategoryName') }}</span>
                    @endif --}}
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
