@extends('auth.auth')
@section('container')

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="invalid-tooltips">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                  </div>
                  <form class="row g-3" action="{{ route('userstore')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                      <label for="Role" class="form-label">{{__('Roles')}}:</label>
                      <select name="userRoles" id="" class="form-control">
                        <option value="{{old('userRoles')}}">{{__('Select Roles')}}</option>
                        @forelse($roles as $role)
                        <option value="{{$role->id}}">
                            {{__($role->role)}}
                        </option>
                        @empty
                        <option value="">{{__('No Data Founds')}}</option>
                        @endforelse
                    </select>
                    </div>

                    <div class="col-12">
                      <label for="fullname" class="form-label">{{__('Full Name')}}</label>
                      <input class="form-control" type="text" id="fullname" placeholder="Enter your name" name="userFullName" value="{{ old('userFullName')}}">
                    </div>

                    <div class="col-12">
                        <label for="emailaddress" class="form-label">{{__('Email address')}}</label>
                        <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="userEmailAddress" value="{{ old('userEmailAddress')}}">
                    </div>
                    <div class="col-12">
                        <label for="userPhoneNumber" class="form-label">{{__('Phone')}}</label>
                        <input class="form-control" type="text" id="userPhoneNumber" placeholder="Enter your Phone" name="userPhoneNumber" value="{{ old('userPhoneNumber')}}">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">{{__('Password')}}</label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                          <input type="password" name="userPassword" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">{{__('Confirm Password')}}</label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                          <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox-signup">
                        <label class="form-check-label" for="checkbox-signup">{{__('I accept')}} <a href="#" class="text-muted">{{__('Terms and Conditions')}}</a></label>
                      </div>
                    </div>
                    <div class="col-3">
                      <button class="btn btn-primary w-100" type="submit">{{__('Create')}}</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ route('userlogin') }}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                
                Designed by <a href="">WDPF R50 Group --B</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>


@endsection
