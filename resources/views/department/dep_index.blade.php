@extends('app')
@section('title','Department')
@push('admin_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<style>
    .dataTables_length{
        padding: 20px 0;
    }
</style>
@endpush
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> --}}
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
              <div class="card-body">

                <table class="table table-borderless datatable">
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
                      <td class="d-flex">
                            <a href="{{ route('department.edit',$dep->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="javascript:void()" onclick="$('#form{{$dep->id}}').submit()">
                                <i class="fa fa-trash"></i>
                            </a> --}}
                            <form id="form{{$dep->id}}" action="{{ route('department.destroy',$dep->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                     </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">There is no Department</td>
                    @endforelse
                  </tbody>
                </table>

              </div>
              <!-- Table with stripped rows -->
              {{-- <table class="table table-striped" id="dataTable">
              </table> --}}
              <!-- End Table with stripped rows -->
              {{ $department->links() }}
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

  @push('admin_script')
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTable').DataTable({
        pagingType: 'first_last_numbers',
    });
  </script>
@endpush

