@extends('frontend.master');
@section('content');

  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Call us now +8801628682796</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="#home"> <img src="{{URL::asset('frontend/img/logo.png')}}" alt="" width="50" height="30" />Hospital</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#doc">Doctors</a></li>
            <li><a href="#facilities">Facilities</a></li>
          </ul>
        </div>


        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
			<div class="row">
				 <div class="col-md-5" style="float:right; margin-right:0">
				@if(session('pa'))
					<div class="alert alert-success fade in alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
					  {{session('pa')}}
					</div>
				@endif
		  </div>
			</div>
          <div class="row">

            <div class="col-lg-5" style="float:right">
				<ul class="nav nav-tabs" style="font-weight:bold">
				  <li class="active"><a data-toggle="tab" href="#home">Appointment</a></li>
				  <li><a data-toggle="tab" href="#menu1">Registration</a></li>
				</ul>

				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active">
					<form class="form-horizontal" action="{{ route('welcome.appointment') }}" method="post">
                      @csrf
						<div class="front_from">
						    <div class="form-group">
								<label for="patient_id">Patient Id<span style="color:red">*</span>:</label>
								<input type="hidden" name="id" id="p_id"/>
								<input type="text" class="form-control" id="patient_id" name="patient_id" placeholder="Patient Id">
								<div class="error" style="color:red;font-style:italic;">{{ $errors->first('patient_id') }}</div>
								<div id="pa_data" style="color:green;font-size:14px;"></div>
							</div>
							<div class="form-group">
								<label for="department">Department Name<span style="color:red">*</span>:</label>
								<select class="form-control select2" style="width: 100%;" id="department" name="department">
								  <option value="">-- select department --</option>
									@forelse($department as $dep)
										<option value="{{$dep['id']}}" {{$dep['id'] == Request::old('department') ? 'selected' : ''}}>{{$dep['name']}}</option>
									@empty
										<option>No data found</option>
									@endforelse

								</select>
								<div class="error" style="color:red;font-style:italic;">{{ $errors->first('department') }}</div>
							</div>
							<div class="form-group">
								<label for="doctor">Doctor Name <span style="color:red">* </span>:</label>
								<select class="form-control select2" style="width: 100%;" id="doctor" name="doctor_id">
											<option value=""></option>
									</select>
									<div class="error" style="color:red;font-style:italic;">{{ $errors->first('doctor_id') }}</div>
									<div id="sch_data" style="color:green;font-size:14px;"></div>
							</div>
                            <div class="form-group">
								<label for="patientPhone">Contact :</label>
								<input type="text" name="patientPhone" id="patientPhone" class="form-control" value="{{old('patientPhone')}}">
							</div>
                            {{-- <div class="form-group">
								<label for="patientProblem">Problem :</label>
								<textarea name="patientProblem" id="patientProblem" class="form-control" rows="1">{{old('patientProblem')}}</textarea>
							</div> --}}
							<div class="form-group">
								<label for="app_date">Appointment Date <span style="color:red">* </span>:</label>
								<div class="input-group date">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
								  <input type="date" class="form-control app_date" min="<?php echo date('Y-m-d'); ?>" name="appoint_date" value="{{old('appoint_date')}}">
								</div>
								<div class="error" style="color:red;font-style:italic;">{{ $errors->first('appoint_date') }}</div>
							</div>

							<div class="form-group">
								<label for="serial">Serial No <span style="color:red">* </span>:</label>
								<div class="ee" style="display:none;color:red">
										No Schedule available
								</div>
								<div class="ss">
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial1">01</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial2">02</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial3">03</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial4">04</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial5">05</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial6">06</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial7">07</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial8">08</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial9">09</a>
								<a class="btn btn-sm btn-success serial" style='padding: 5px;font-size:12px;' id="serial10">10</a>
								<input type="hidden" name="serial" id="serial_div" />
								</div>
							</div>
							<div class="error" style="color:red;font-style:italic;">{{ $errors->first('serial') }}</div>

							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				  </div>
				  <div id="menu1" class="tab-pane fade">
					<form class="form-horizontal" method="post" action="{{route('welcome.store')}}">
                        @csrf
						<div class="front_from">
							<div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="patientName">Full Name <span style="color:red">*</span>:</label>
										<input type="text" class="form-control" id="patientName" name="patientName" placeholder="First Name" required>
									</div>
									<div class="col-md-6">
                                        <label for="patientAge">Age <span style="color:red">*</span>:</label>
										<input type="number" class="form-control" id="patientAge" name="patientAge" placeholder="Age" required>
									</div>
								</div>
							</div>
						    <div class="form-group">
								<label for="patientPhone">Contact<span style="color:red">*</span>:</label>
								<input type="text" class="form-control" id="patientPhone" name="patientPhone" placeholder="Mobile Number" required>
							</div>
							<div class="form-group">
								<label for="patientGender">Gender<span style="color:red">*</span>:</label>
								&nbsp;
								<input type="radio" name="patientGender" value="1"> Male
								&nbsp;
								<input type="radio" name="patientGender" value="2"> Female
								&nbsp;
								<input type="radio" name="patientGender" value="3"> Common
							</div>
							<div class="form-group">
								<label for="birth_date">Date of Birth<span style="color:red">*</span>:</label>
								<input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Date of Birth" required>
							</div>
							<div class="form-group">
								<label for="patientBlood">Blood Group:</label>
								<select class="form-control" id="patientBlood" name="patientBlood" required>
									<option value="0">-- select --</option>
									@forelse($blood as $b)
										<option value="{{$b['id']}}">{{$b['blood_name']}}</option>
									@empty
										<option>No data found</option>
									@endforelse
								</select>
							</div>
							<div class="form-group">
								<label for="patientAddress">Address<span style="color:red">*</span>:</label>
								<textarea name="patientAddress" id="patientAddress" class="form-control" rows="1" required></textarea>
							</div>
							<div class="form-group">
								<label for="patientProblem">Problem<span style="color:red">*</span>:</label>
								<textarea name="patientProblem" id="patientProblem" class="form-control" rows="1" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				  </div>
				</div>

            </div>
            <div class="col-lg-6">
              <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <img src="{{URL::asset('frontend/img/dummy/frontimg1.png')}}" class="img-responsive" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-check fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Make an appoinment</h4>
                <p>
                  Registration is required to make an appointment.When making an appointment you should give the person your name and the reason for wanting an appointment.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Choose your package</h4>
                <p>
                    Our health check-up programs are designed to promote good health and facilitate early detection of health problems. Our goal is to encourage people toward a longer and healthier life so that there will be HOPE of having quality time with family.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">
                <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Help by specialist</h4>
                <p>
                  Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                <h4 class="h-bold">Get diagnostic report</h4>
                <p>
                  Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /Section: boxes -->


    <section id="callaction" class="home-section paddingtop-40">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="callaction bg-gray">
              <div class="row">
                <div class="col-md-8">
                  <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <div class="cta-text">
                      <h3>In an emergency? Need help now?</h3>
                      <p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                    <div class="cta-btn">
                      <a href="#" class="btn btn-skin btn-lg">Book an appoinment</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Section: services -->
    <section id="service" class="home-section nopadding paddingtop-60">

      <div class="container">

        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <img src="{{asset('frontend/img/dummy/img-1.jpg')}}" class="img-responsive" alt="" />
            </div>
          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-stethoscope fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Medical checkup</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-wheelchair fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Nursing Services</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>
            <div class="wow fadeInRight" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-plus-square fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Pharmacy</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>


          </div>
          <div class="col-sm-3 col-md-3">

            <div class="wow fadeInRight" data-wow-delay="0.1s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-h-square fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Gyn Care</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

            <div class="wow fadeInRight" data-wow-delay="0.2s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-filter fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Neurology</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>
            <div class="wow fadeInRight" data-wow-delay="0.3s">
              <div class="service-box">
                <div class="service-icon">
                  <span class="fa fa-user-md fa-3x"></span>
                </div>
                <div class="service-desc">
                  <h5 class="h-light">Sleep Center</h5>
                  <p>Vestibulum tincidunt enim in pharetra malesuada.</p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
    <!-- /Section: services -->


     <!-- Section: team -->
    <section id="doc" class="home-section bg-gray paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Doctors</h2>
                <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
		@foreach($doctor as $l)
          <div class="col-md-3 div_wrap" >
			<div class="wrapper">
				<a href="" class="anchor">
					{{-- <img src="{{URL::asset('images/'.$l['employ_basic']['picture']) }}" alt="no image" width='250px' height='200px'/> --}}
                    @if($l->employee->picture == '')
                    <i class="fa fa-user-md" style="font-size:150px;"></i>
                @else
                    <img src="{{ asset('uploads/employee/'.$l->employee->picture) }}" alt="no image" width="250" height="200"/>
                @endif
					<div class="wrap_child">
						<div class='text'>view profile</div>
					</div>
				</a>
			</div>
			<div class="name">{{$l['employee']['name']}}</div>
			<div class="dep">{{$l['department']['name']}}</div>
		  </div>
		  @endforeach

        </div>
      </div>

    </section>
    <!-- /Section: team -->



    <!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our facilities</h2>
                <p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div id="owl-works" class="owl-carousel">
                <div class="item"><a href="{{URL::asset('frontend/img/photo/1.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="{{URL::asset('frontend/img/photo/1.jpg')}}" class="img-responsive" alt="img"></a></div>
                <div class="item"><a href="{{URL::asset('frontend/img/photo/2.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="{{URL::asset('frontend/img/photo/2.jpg')}}" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="{{URL::asset('frontend/img/photo/3.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="{{URL::asset('frontend/img/photo/3.jpg')}}" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="{{URL::asset('frontend/img/photo/4.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="{{URL::asset('frontend/img/photo/4.jpg')}}" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="{{URL::asset('frontend/img/photo/5.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="{{URL::asset('frontend/img/photo/5.jpg')}}" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="{{URL::asset('frontend/img/photo/6.jpg')}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="{{URL::asset('frontend/img/photo/6.jpg')}}" class="img-responsive " alt="img"></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: works -->


    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
                <div class="item active">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Emergency Contraception</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/1.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Anna</a>
                      <span>Chicago, Illinois</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Orthopedic Surgery</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/2.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Matthew G</a>
                      <span>San Antonio, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Medical consultation</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/3.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Scarlet Smith</a>
                      <span>Dallas, Texas</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Birth control pills</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/4.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Lucas Thompson</a>
                      <span>Austin, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Radiology</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                        <span
                          data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/5.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Ella Mentree</a>
                      <span>Fort Worth, Texas</span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Cervical Lesions</a>
                      <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                      </div>
                      <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="{{URL::asset('frontend/img/testimonials/6.jpg')}}" alt="" class="person img-circle" />
                      <a title="" href="#">Suzanne Adam</a>
                      <span>Detroit, Michigan</span>
                    </div>
                  </div>
                </div>


              </div>

              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: testimonial -->


    <section id="partner" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow lightSpeedIn" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Our partner</h2>
                <p>Take charge of your health today with our specially designed health packages</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="{{URL::asset('frontend/img/dummy/partner-1.jpg')}}" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="{{URL::asset('frontend/img/dummy/partner-2.jpg')}}" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="{{URL::asset('frontend/img/dummy/partner-3.jpg')}}" alt="" /></a>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="partner">
              <a href="#"><img src="{{URL::asset('frontend/img/dummy/partner-4.jpg')}}" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>About Hospital</h5>
                <p>
                  Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                </p>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Information</h5>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Laboratory</a></li>
                  <li><a href="#">Medical treatment</a></li>
                  <li><a href="#">Terms & conditions</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Medicio center</h5>
                <p>
                  Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                </p>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medicio.com
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Our location</h5>
                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Follow us</h5>
                <ul class="company-social">
                  <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                  <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright  All rights reserved.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  @endsection
