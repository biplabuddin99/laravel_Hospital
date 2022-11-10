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
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="panel-heading"><a href="{{route('department.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Department </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Department</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#SL No</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($department as $dep)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $dep->name }}</td>
                        <td>{{ $dep->description }}</td>
                        <td>@if($dep->status==1) Active @else Inactive @endif</td>
                        <td>
                            <a href="{{ route('department.edit',$dep->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href=""><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                        </td>
                    </tr>
                    @empty
                    <td>There is no Depertment</td>
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
