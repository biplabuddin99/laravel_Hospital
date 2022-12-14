@extends('app')
@section('title','Doctor')

@section('content')

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
     <div class="panel-heading"><a href="{{route('doctor.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Doctor </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="table-responsive">
              <h5 class="">List of Doctor</h5>

              <!-- Table with stripped rows -->
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">SL.No</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doct)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>

                            @if($doct->employee->picture == '')
                                <i class="fa fa-user-md" style="font-size:50px;"></i>
                            @else
                                <img src="{{ asset('uploads/employee/'.$doct->employee->picture)}}" height="50" width="80" alt="no image" />
                            @endif

                        </td>
                        <td>{{ $doct->employee->name }}</td>
                        @if($doct->department_id=='' )
                        <td>no department</td>
                        @else
                        <td>{{ $doct->department->name }}</td>
                        @endif
                        @if($doct->designation_id =='' )
                        <td>no designation</td>
                        @else
                        <td>{{ $doct->designation->desig_name }}</td>
                        @endif
                        <td>{{ $doct->employee->email }}</td>
                        <td>{{ $doct->employee->phone }}</td>
                         <td class="d-flex">
                          <a class="text-success " style="padding-right:8px" href="{{route('doctor.show',$doct['id'])}}">
                            <i class="ace-icon fa fa-eye bigger-130"></i>
                            </a>
                            <a href="{{ route('doctor.edit',$doct->id) }}" class=""><i class="fa-solid fa-pen-to-square"></i></a>
                             <form id="form{{$doct->id}}" action="{{ route('doctor.destroy',$doct->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="8" class="text-center">There is no docteor</td>
                    @endforelse

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{-- {{ $doctors->links() }} --}}
            </div>
          </div>


              <!-- End small tables -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>
@endsection
