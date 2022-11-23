@extends('app')
@section('content')


  <main id="main" class="main">

    <section class="section">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Appointment</h5>

              <!-- Horizontal Form -->
              <form action="{{ route('appoint.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="p_id" class="col-sm-2 col-form-label">Patient Id<span style="color:red">*</span>:</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id" id="p_id"/>
					          <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ Request::old('patient_id') }}">
                    <div id="pa_data" style="color:green;font-size:14px;"></div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="department" class="col-sm-2 col-form-label">Department Name<span style="color:red">*</span>:</label>
                  <div class="col-sm-10">
                  <select class="form-control"  id="department" name="department">
                    <option value="">Select Department</option>
                    
                         @forelse($department as $dep)
                            <option value="{{$dep->id}}">
                                {{__($dep->name)}}
                            </option>
                          @empty
                            <option value="">No Data Founds</option>
                          @endforelse
                          
                  </select>
                   
                    {{-- @if($errors->has('department'))
                      <span class="text-danger">
                        {{ $errors->first('department') }}
                      </span>
                      @endif --}}
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="doctor" class="col-sm-2 col-form-label">Doctor Name<span style="color:red">* </span>:</label>
                    <div class="col-sm-10">
                    <select class="form-control"  id="doctor" name="doctor_id">
                      <option value=""></option>    
                    </select>
                    <div id="sch_data" style="color:green;font-size:14px;"></div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="phone" class="col-sm-2 col-form-label">Phone<span style="color:red">* </span>:</label>
                  <div class="col-sm-10">
                    <input type="text" name="patientPhone" cols="30" class="form-control" id="phone" value="{{ old('patientPhone') }}">

                    {{-- @if($errors->has('patientPhone'))
                    <span class="text-danger">
                        {{ $errors->first('patientPhone')}}
                    </span>
                    @endif --}}

                  </div>
                </div>

                <div class="row mb-3">
                    <label for="problem" class="col-sm-2 col-form-label">Problem:</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="patientProblem" value="" cols="30" class="form-control" id="problem">{{ old('patientProblem') }}</textarea>
   
                      {{-- @if($errors->has('patientProblem'))
                    <span class="text-danger">
                      {{ $errors->first('patientProblem') }}
                    </span>
                    @endif --}}
                  </div>
                </div>
                    
                <div class="row mb-3">
                  <label for="birth_date" class="col-sm-2 col-form-label">Appointment Date<span style="color:red">* </span>:</label>
                  <div class="col-sm-10">
                    <input type="date" name="appoint_date" cols="30" class="form-control app_date" id="datepicker" value="">
                   
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="serial">Serial No <span style="color:red">* </span>:</label>
                    <div class="col-sm-10 ee" style="display:none;color:red">
                        No Schedule available
                    </div>
                    <div class="col-sm-9 ss">
                      <a class="btn btn-sm btn-success serial" id="serial1">01</a>
                      <a class="btn btn-sm btn-success serial" id="serial2">02</a>
                      <a class="btn btn-sm btn-success serial" id="serial3">03</a>
                      <a class="btn btn-sm btn-success serial" id="serial4">04</a>
                      <a class="btn btn-sm btn-success serial" id="serial5">05</a>
                      <a class="btn btn-sm btn-success serial" id="serial6">06</a>
                      <a class="btn btn-sm btn-success serial" id="serial7">07</a>
                      <a class="btn btn-sm btn-success serial" id="serial8">08</a>
                      <a class="btn btn-sm btn-success serial" id="serial9">09</a>
                      <a class="btn btn-sm btn-success serial" id="serial10">10</a>
                      <input type="hidden" name="serial" id="serial_div" />
                    </div>

                    {{-- @if($errors->has('serial'))
                    <span class="text-danger">
                        {{ $errors->first('serial')}}
                    </span>
                    @endif --}}

                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status:</label>
                    <div class="col-sm-9">
                        <input type="radio" name="approve" value="1" checked> Approve
                        &nbsp;
                        <input type="radio" name="approve" value="2" {{ Request::old('status') == '0' ? 'checked' : '' }}> Not Approve
                    </div>
                </div>
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
					url:"{{ route('app.getPatient') }}",
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
							$('#pa_data').append(name); 
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
					url:"{{ route('app.getEmploy') }}",
					data:{'id':department_id},
					
					success:function(data){
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
					url:"{{ route('app.getSchedule') }}",
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
					url:"{{ route('app.getSerial') }}",
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
  @endsection