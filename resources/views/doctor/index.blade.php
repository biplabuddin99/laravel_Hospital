@extends('app')
@section('title','Doctor')

@section('content')

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
     <div class="panel-heading"><a href="{{route('designation.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Designation </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Designation</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SL.No</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>`id`, `employee_id`, `department_id`, `designation_id`, `biography`, `specialist`, `education`, `status`
                    @forelse ($doctors as $doct)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $doct->employee_id }}</td>
                        <td>{{ $doct->department_id }}</td>
                        <td>{{ $doct->department_id }}</td>
                        <td>@if($doct->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('doctignation.edit',$doct->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="javascript:void()" onclick="$('#form{{$doct->id}}').submit()">
                                <i class="fa fa-trash"></i>
                            </a>  --}}
                             <form id="form{{$doct->id}}" action="{{ route('doctignation.docttroy',$doct->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0" type="submit" onclick="return confirm('are You confirm?')"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">There is no docteor</td>
                    @endforelse

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{ $doctors->links() }}
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