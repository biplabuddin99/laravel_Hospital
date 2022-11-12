@extends('auth.auth')
@section('container')
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                    @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <p class="invalid-tooltips">{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                    @endif
                  </div>

                  <form class="row g-3 needs-validation" action="{{route('userlogin')}}" method="POST">
                    @csrf
                    @method('post')

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
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

@endsection
