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
            <div class="panel-heading"><a href="{{ route('patientAdmit.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Admit Patient </a></div>

        <section class="section">
              <div class="row">
                <div class="col-lg-12">
                  <div class="">
                    <div class="">
                      <h5 class="card-title">Admited Patient</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">#SL</th>
                              <th scope="col">Patient Name</th>
                              <th scope="col">Picture</th>
                              <th scope="col">Father Name</th>
                              <th scope="col">Admit_date</th>
                              <th scope="col">Guardian</th>
                              <th scope="col">Problem</th>
                              <th scope="col">Reference</th>
                              <th scope="col">Room Category</th>
                              <th scope="col">Room No</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>

                          <tbody>
                              @forelse($patient_admit as $pa)
                              <tr>
                                <th>{{ ++$loop->index }}</th>
                                <td>{{ $pa->name }}</td>
                                <td>
                                    @if($pa['picture'] == '')
                                      <i class="fa fa-wheelchair" style="font-size:50px;"></i>
                                    @else
                                      <img width="50px" src="{{ asset('uploads/patientAdmit/'.$pa->picture) }}" alt="No image">
                                    @endif
                                </td>
                                <td>{{ $pa->father_name }}</td>
                                <td>{{ $pa->admit_date }}</td>
                                <td>{{ $pa->guardian }}</td>
                                <td>{{ $pa->problem }}</td>
                                <td>{{ $pa->doctor->employee?->name }}</td>
                                <td>{{ $pa->room_category->name }}</td>
                                <td>{{ $pa->room_list->room_no }}</td>
                                <td>@if($pa->status==1) Active @else Inactive @endif</td>
                                <td class="d-flex">
                                  <a href="{{ route('patientAdmit.edit',$pa->admit_id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  &nbsp;
                                  <form id="form{{$pa->id}}" action="{{ route('patientAdmit.destroy',$pa->admit_id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash' style='color: red'></i></a></button>
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
  </main>

@endsection
