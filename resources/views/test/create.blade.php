@extends('app')
@section('content')
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Test</h5>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif

              <div class="panel-heading"><a href="{{route('test.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Test List </a></div>

              <!-- Horizontal Form -->
              <form action="{{ route('test.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="row mb-3">
                  <label for="catname" class="col-sm-2 col-form-label">Test Categroy:</label>
                  <div class="col-sm-10 mb-3">
                    <select class="form-control" name="testCategory" id="" required>
                      <option value="">Select Category</option>
                      @forelse($testcat as $tc)

                      <option value="{{ $tc->id }}" {{$tc->id == old('testCategory') ? 'selected' : ''}}>{{ $tc->name }}</option>
                      @empty $doctor->department->id == $tc->id
                      <option value="">No Data Found</option>
                      @endforelse
                    </select>
                  </div>
                  <label for="name" class="col-sm-2 col-form-label">Test Name:</label>
                  <div class="col-sm-10 mb-3">
                    <input type="text" class="form-control" id="name"  name="name" value="{{ old('name')}}" required>
                  </div>
                  <label for="price" class="col-sm-2 col-form-label">Price:</label>
                  <div class="col-sm-10 mb-3">
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price')}}" required>
                  </div>
                  <label for="desc" class="col-sm-2 col-form-label">Description:</label>
                  <div class="col-sm-10 mb-3">
                    <input type="text" class="form-control" id="desc" name="description" value="{{ old('description')}}">
                  </div>
                </div>
                <fieldset class="row mb-3 mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Status:</legend>
                  <div class="col-sm-10 mb-3">
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
