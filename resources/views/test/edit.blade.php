@extends('app')
@section('content')
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Test</h5>

              <div class="panel-heading"><a href="{{route('test.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Test List </a></div>
              <br>
              <!-- Horizontal Form -->
              <form action="{{ route('test.update',$test->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Test Category:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="testCategory" id="" required>
                      <option value="">Select Category</option>
                      @forelse($testCategory as $tc)

                      <option value="{{ $tc->id }}" {{ $test->test_category_id == $tc->id ? 'selected' : ''}}>{{ $tc->name }}</option>
                      @empty 
                      <option value="">No Data Found</option>
                      @endforelse
                    </select>
                  </div>
                  <label for="name" class="col-sm-2 col-form-label">Test Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $test->name }}">
                  </div>
                  <label for="price" class="col-sm-2 col-form-label">Price:</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" value="{{ $test->price }}">
                  </div>
                  <label for="desc" class="col-sm-2 col-form-label">Description:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="desc" name="description" value="{{ $test->description }}">
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
