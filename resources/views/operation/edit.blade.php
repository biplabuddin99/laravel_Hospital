@extends('app')
@section('content')


<main id="main" class="main">
  
  
  <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="panel-heading"><a href="{{route('operation.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Operation List </a></div>

    <!-- Horizontal Form -->
    <form action="{{ route('operation.update', $operation->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('patch')
        <div class="card">
          <div class="card-body m-3">

              <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">Patient Name <span style="color:red" >* </span>:</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="patientName" value="{{ old('patientName', $operation->name) }}" required>
                          </div>
                          <label class="control-label col-sm-4" for="birthdate">Date of Birth <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" id="birthdate" name="birth_date" value="{{ old('birth_date', $operation->dob) }}">
                          </div>
                          <label class="control-label col-sm-4" for="sex">Gender <span style="color:red">* </span>:</label>
                          <div class="col-sm-8">
                            <input type="radio" value="1" {{ $operation->gender=='1' ? 'checked':'' }} id="m" {{ old('patientGender')=='1' ? 'checked':'' }} name="patientGender"> Male
                            &nbsp;
                            <input type="radio" value="2" {{ $operation->gender=='2' ? 'checked':'' }} id="f" {{ old('patientGender')=='2' ? 'checked':'' }} name="patientGender"> Female
                            &nbsp;
                            <input type="radio" value="3" {{ $operation->gender=='3' ? 'checked':'' }} id="c" {{ old('patientGender')=='3' ? 'checked':'' }} name="patientGender"> Other <br>
                          </div>
                          <label class="control-label" for="address"> Address <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <textarea name="address" id="address" cols="30" class="form-control" rows="5" required>{{ old('address', $operation->address) }}</textarea>
                              </div>
                                <label class="control-label col-sm-4" for="blood">Blood Group <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="blood" name="blood" required>
                                  <option value="">Select Blood Group</option>
                                  <option value="A+" {{ $operation->blood=='A+' ? 'selected':''}}>A+</option>
                                  <option value="A-"{{ $operation->blood=='A-' ? 'selected':''}}>A-</option>
                                  <option value="B+"{{ $operation->blood=='B+' ? 'selected':''}}>B+</option>
                                  <option value="B-"{{ $operation->blood=='B-' ? 'selected':''}}>B-</option>
                                  <option value="O+"{{ $operation->blood=='O+' ? 'selected':''}}>O+</option>
                                  <option value="O-"{{ $operation->blood=='O-' ? 'selected':''}}>O-</option>
                                  <option value="AB+"{{ $operation->blood=='AB+' ? 'selected':''}}>AB+</option>
                                  <option value="AB-"{{ $operation->blood=='AB-' ? 'selected':''}}>AB-</option>
                                </select>
                              </div>
                        </div>
                    </div>    
     
                        
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            
                            <label class="control-label col-sm-4" for="father_name">Father Name <span style="color:red" >* </span>:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $operation->father_name) }}"  required>
                          </div>
                              <label class="control-label col-sm-4" for="mother_name">Mother Name <span style="color:red">* </span>:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $operation->mother_name) }}" required>
                            </div>
                              <label class="control-label col-sm-4" for="doctor_ref">Doctor Ref. <span style="color:red" >* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="doctor_ref" name="doctor_ref" value="{{ old('doctor_ref') }}" required>
                                  <option>-- select --</option>
                                      @forelse($doctor as $d)
                                        <option value="{{$d->id}}" {{ $operation->doctor_id == $d->id ? 'selected' : ''}}>{{$d->employee->name }}</option>
                                      @empty
                                        <option>No data found</option>
                                      @endforelse
                                </select>
                              </div>
                              <label class="control-label col-sm-4" for="operation_date">Operation Date <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <input type="date" class="form-control" id="operation_date" name="operation_date" value="{{ old('operation_date', $operation->opr_date  ) }}">
                              </div>
                              <label class="control-label col-sm-4" for="ot_no">OT No <span style="color:red">* </span>:</label>
                              <div class="col-sm-8">
                                <select class="form-control" id="ot_no" name="ot_no" required>
                                  <option value="">Select OT</option>
                                  <option value="OT NO-101" {{ $operation->ot_no=='OT NO-101' ? 'selected':''}}>OT NO-101</option>
                                  <option value="OT NO-102" {{ $operation->ot_no=='OT NO-102' ? 'selected':''}}>OT NO-102</option>
                                  <option value="OT NO-103" {{ $operation->ot_no=='OT NO-103' ? 'selected':''}}>OT NO-103</option>
                                  <option value="OT NO-104" {{ $operation->ot_no=='OT NO-104' ? 'selected':''}}>OT NO-104</option>
                                  <option value="OT NO-105" {{ $operation->ot_no=='OT NO-105' ? 'selected':''}}>OT NO-105</option>
                                </select>
                              </div>
                              <label class="control-label col-sm-4" for="description">Description <span style="color:red" >* </span>:</label>
                                  <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="description" name="description"  required>{{ old('address', $operation->description) }}</textarea>
                                  </div>
                                </div>
                            </div>
                          </div>
                          <br>
                              <label class="col-sm-1">Status<span style="color:red" >* </span> :</label>
                                <input type="radio" value="1" name="status" checked> Active
                                &nbsp;
                                <input type="radio" value="0" name="status"> Inactive

                  <br>     <br>



                            <div class="text-center">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <span class="btn or">or</span>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
              </div>
            </div>
      </form><!-- End Horizontal Form -->
    </main><!-- End #main -->

  @endsection

  
  <script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
		$(document).ready(function() {
		//#------------------------------------
		//   Patient ID Search
		//#------------------------------------
			$('#search_p').click(function(){
			var patient_id = $('#patient_id').val();
			$.ajax({
				url:'{{ route("inv.getpatient") }}',
				type: 'GET',
				data: {'id':patient_id},
				success: function(data){
					//console.log(data);
          if(data){
						$('#checkExist').val(data[0].id);
						$('#name').val(data[0].name);
						$('#birthdate').val(data[0].dob);
						$('#address').val(data[0].address);
						$('#phone').val(data[0].phone);
						$('#blood').val(data[0].blood);
						if(data[0].gender==1){
							$('#m').attr('checked', true);
						} else if(data[0].gender==2){
							$('#f').attr('checked', true);
						} else if(data[0].gender==3){
							$('#c').attr('checked', true);
						} else{
						}

					}
				}
			});
		});
    
  });
</script>

