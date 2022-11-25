@extends('app')
@section('title','test')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Test Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Test</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="panel-heading"><a href="{{route('testCategory.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Test Category </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Test Categoroy</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#SL No</th>
                    <th scope="col">Test Category Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($testcat as $test)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $test->name }}</td>
                        <td>@if($test->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('testCategory.edit',$test->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form id="form{{$test->id}}" action="{{ route('testCategory.destroy',$test->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">There is no Data</td>
                    @endforelse

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{-- {{ $testcat->links() }} --}}
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
