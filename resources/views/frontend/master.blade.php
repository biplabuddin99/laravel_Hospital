<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<title>Hospital Management System</title>
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <!-- css -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/cubeportfolio.min.css')}}">
  <link href="{{asset('frontend/css/nivo-lightbox.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/default.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet" media="screen" />
  <link href="{{asset('frontend/css/owl.theme.css')}}" rel="stylesheet" media="screen" />
  <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/front_style.css')}}" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="{{asset('frontend/css/bg1.css')}}" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="{{asset('frontend/css/color/default.css')}}" rel="stylesheet">

</head>



<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	@yield('content')


  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/js/wow.min.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.scrollTo.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.appear.js')}}"></script>
  <script src="{{asset('frontend/js/stellar.js')}}"></script>
  <script src="{{asset('frontend/js/jquery.cubeportfolio.min.js')}}"></script>
  <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/js/nivo-lightbox.min.js')}}"></script>
  <script src="{{asset('frontend/js/custom.js')}}"></script>

  <script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script>

		$(document).ready(function(){


			/*keyup function for patient name*/
			$('#patient_id').keyup(function(){

				var pa = '<div style="color:red">Invalid patient ID</div>';
				$('#pa_data').html('');
				$('#pa_data').append(pa);

				var patient = $(this).val();
				var div = $(this).parent();
				$.ajax({

					type:'get',
					url:"{{ route('welcome.getPatient') }}",
					data:{'id':patient},
					success:function(data){
						if(data.length>0){
							//console.log(data);
							var id = data[0].id;
							var name = data[0].name;

							/*get id from patient table*/
							$('#p_id').val('');
							$('#p_id').val(id);

							/*get firstname and lastname from patient table*/
							$('#pa_data').html('');
							$('#pa_data').append(name).css('color','#2fd82f');
						}
					}
				});
			});



			/*------select department option and show doctor name------*/
			$('#department').on('change', function(){
				//console.log('this is change');
				var department_id = $(this).val();
				var div = $(this).parent();
				$.ajax({

					type:'get',
					url:"{{ route('welcome.getEmploy') }}",
					data:{'id':department_id},

					success:function(data){
						//console.log('success');
						//console.log(data);

						var op= "<option value='0' selected disabled>-- select doctor name --</option>"+data;


						$('#doctor').html('');
						$('#doctor').append(op);
					}
				});

			});

			/*------select doctor name option and show schedule------*/
			$('#doctor').on('change', function(){
				//console.log('this is change');
				var doctor = $(this).val();
				var div = $(this).parent();
				$.ajax({

					type:'get',
					url:"{{ route('welcome.getSchedule') }}",
					data:{'id':doctor},

					success:function(data){

						if(data==''){
							var err = '<div style="color:red">No Schedule Available</div>';
							$('#sch_data').html('');
							$('#sch_data').append(err);
						}else{
							$('#sch_data').html('');
							$('#sch_data').append(data);
						}


					}
				});

			});

			/*------select serial number------*/
			$('.serial').click(function(){
				var s = $(this).addClass('btn-danger').text();
				$('.serial').attr('disabled','disabled');
				$('#serial_div').val('');
				$('#serial_div').val(s);
			});


			/*------select doctor name option and show serial number active or inactive------*/
			$('.app_date').on('change', function(){

				$('.serial').removeClass('btn-danger').attr('disabled',false);
				var doctor = $('#doctor').val();
				var app_date = $(this).val();
				var div = $(this).parent();
				$.ajax({

					type:'get',
					url:"{{ route('welcome.getSerial') }}",
					data:{'id':doctor, 'dat':app_date},

					success:function(data){
						console.log(data);
						if(data == 'daYnotfind')
						{
							$('.ss').css('display','none');
							$('.ee').css('display','block');
						}
						else if(data == 'rownotfind')
						{
							$('.ss').css('display','block');
							$('.ee').css('display','none');
						}else{
							$('.ss').css('display','block');
							$('.ee').css('display','none');
							var ser = '';
							for(var i=0;i<data.length;i++){
								ser = data[i].serial;
								if(ser == 01){
									$('#serial1').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 02){
										$('#serial2').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 03){
										$('#serial3').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 04){
										$('#serial4').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 05){
										$('#serial5').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 06){
										$('#serial6').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 07){
										$('#serial7').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 08){
										$('#serial8').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 09){
										$('#serial9').addClass('btn-danger').attr('disabled','disabled');
								}else if(ser == 10){
										$('#serial10').addClass('btn-danger').attr('disabled','disabled');
								}else{

									//$('#serial').addClass('btn-danger').attr('disabled','disabled');
								}
							}
						}

					}
				});

			});


		});
	</script>

</body>

</html>
