@extends('app')
@section('content')


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Appointment Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Appointment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="panel-heading"><a href="{{route('appoint.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Appointment </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">List of Appointment</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">SL.No</th>
                          <th scope="col">Patient Id</th>
                          <th scope="col">Doctor Name</th>
                          <th scope="col">Serial No</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Problem</th>
                          <th scope="col">Appointment Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @forelse ($appoint as $app)
                          <tr>
                              <th>{{ ++$loop->index }}</th>
                              <td>{{ $app->patient?->patient_id }}</td>
                              <td>{{ $app->employee?->name }}</td>
                              <td>{{ $app->serial }}</td>
                              <td>{{ $app->phone }}</td>
                              <td>{{ $app->problem }}</td>
                              <td>{{ $app->appoint_date }}</td>
                              <td>@if($app->status==1) Active @else Inactive @endif</td>
                              <td class="d-flex">
                                  <a href="{{ route('appoint.edit',$app->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  &nbsp;
                                  <form id="form{{$app->id}}" action="{{ route('appoint.destroy',$app->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash' style='color: red'></i></a></button>
                                </form>
                              </td>
                          </tr>
                          @empty
                          <td colspan="10" class="text-center">There is no Appointment</td>
                          @endforelse

                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>
                </div>


              <!-- End small tables -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
