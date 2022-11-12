@include('layouts.header')

  <!-- ======= Header ======= -->
  @include('layouts.topbar')
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.sidebar')
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="panel-heading"><a href="{{route('patient.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Patient </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Patient</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Patient Id</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birth_Date</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Blood</th>
                    <th scope="col">Address</th>
                    <th scope="col">Problem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($patient as $p)
                    <tr>
                        <th scope="row">{{ ++$loop->index+1000 }}</th>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->age }}</td>
                        <td>{{ $p->phone }}</td>
                        <td>{{ $p->dob }}</td>
                        <td>@if($p->gender==1) Male @elseif ($p->gender==2) Female @else Other @endif</td>
                        <td>{{ $p->blood }}</td>
                        <td>{{ $p->address }}</td>
                        <td>{{ $p->problem }}</td>
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
                    <td colspan="10" class="text-center">There is no Patient</td>
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

  <!-- ======= Footer ======= -->
@include('layouts.footer')
