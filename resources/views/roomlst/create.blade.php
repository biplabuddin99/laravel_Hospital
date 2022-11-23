@extends('app')
@section('content')
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Room </h5>

              <!-- Horizontal Form -->
              <form action="{{ route('roomList.store') }}" method="POST">
                @csrf
                @method('post')
                <div class="form-group  mb-3">
                    <label class="control-label col-sm-3" for="room_cat_name">Room Category Name:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="room_cat_name" name="room_cat_name" required>
                        <option>-- select --</option>
                        @forelse($bl as $b)
                            <option value="{{$b->id}}" {{$b->id == old('room_cat_name') ? 'selected' : ''}}>{{$b->name}}</option>
                        @empty
                            <option>No data found</option>
                        @endforelse
                    </select>
                <div class="error" style="color:red;font-style:italic;">{{ $errors->first('room_cat_name') }}</div>
                </div>
                </div>
                <div class="form-group mb-3">
                  <label for="roomno" class="col-sm-2 col-form-label">Room No:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="roomno" name="roomListNo">
                    {{-- @if($errors->has('roomListNo'))
                      <span class="text-danger"> {{ $errors->first('roomListNo') }}</span>
                    @endif --}}
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="floorno" class="col-sm-2 col-form-label">Floor No:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="floorno" name="roomfloorNo">
                    {{-- @if($errors->has('roomfloorNo'))
                      <span class="text-danger"> {{ $errors->first('roomfloorNo') }}</span>
                    @endif --}}
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="des" class="col-sm-2 col-form-label">Description:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="des" name="rmdescripton">
                    {{-- @if($errors->has('rmdescripton'))
                      <span class="text-danger"> {{ $errors->first('rmdescripton') }}</span>
                    @endif --}}
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="capc" class="col-sm-2 col-form-label">Capacity:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="capc" name="Capacity">
                    {{-- @if($errors->has('roomCapacity'))
                      <span class="text-dangeroomPrice"> {{ $errors->first('roomCapacity') }}</span>
                    @endif --}}
                  </div>
                </div>

                <div class="form-group mb-3">
                  <label for="prc" class="col-sm-2 col-form-label">Price:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prc" name="roomPrice">
                    {{-- @if($errors->has('roomPrice'))
                      <span class="text-dangeroomPrice"> {{ $errors->first('roomPrice') }}</span>
                    @endif --}}
                  </div>
                </div>

                <fieldset class="form-group mb-3">
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
