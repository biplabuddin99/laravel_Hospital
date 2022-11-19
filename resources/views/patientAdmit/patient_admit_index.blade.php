@extends('app')
@section('content')
    
<main id="main" class="main">

            <div class="pagetitle">
              <h1>Admited Patient Tables</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item">Tables</li>
                  <li class="breadcrumb-item active">Admit_patient</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="panel-heading"><a href="{{route('patientAdmit.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Admit Patient </a></div>

        <section class="section">
              <div class="row">

                <div class="col-lg-12">

                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Admited Patient</h5>

                      <!-- Table with stripped rows -->
                      <table class="table table-striped">
												<thead>
													<tr>
														<th scope="col">#SL</th>
														<th scope="col">Patient Name</th>
														<th scope="col">Father Name</th>
														<th scope="col">Reference Doctor</th>
														<th scope="col">Admit_date</th>
														<th scope="col">Guardian</th>
														<th scope="col">Problem</th>
														<th scope="col">Reference</th>
														<th scope="col">Room No</th>
														<th scope="col">Action</th>
													</tr>
												</thead>

												<tbody>
                            @forelse($patient_admit as $pa)
                            <tr>
                              <th>{{ ++$loop->index }}</th>
                              <td>{{ $p->name }}</td>
                              <td>{{ $p->fatherName }}</td>
                              <td>{{ $p->doctor_ref }}</td>
                              <td>{{ $p->admit_date }}</td>
                              <td>{{ $p->guardian }}</td>
                              <td>{{ $p->problem }}</td>
                              <td>{{ $p->reference }}</td>
                              <td>{{ $p->room }}</td>
                              <td>@if($p->status==1) Active @else Inactive @endif</td>
                              <td class="d-flex">
                                <a href="{{ route('patient.edit',$p->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                &nbsp;
                                <form id="form{{$p->id}}" action="{{ route('patient.destroy',$p->id) }}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <button class="btn p-0" type="submit" onclick="return confirm('Are you confirm to Delete?')"><i class='bi bi-trash' style='color: red'></i></a></button>
                              </form>
                            </td>
                            </tr>
                                @empty
                            <tr>
                              <td scope="col" colspan="12" style="text-align:center">No data found</td>
                            </tr>
                                @endforelse
										    </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
        </section>

  @endsection