@extends('app')
@section('title','Designation')
<!-- End Sidebar-->
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
                    <th scope="col">#SL No</th>
                    <th scope="col">Designation Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($designations as $des)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $des->desig_name }}</td>
                        <td>{{ $des->desig_des }}</td>
                        <td>@if($des->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('designation.edit',$des->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="javascript:void()" onclick="$('#form{{$des->id}}').submit()">
                                <i class="fa fa-trash"></i>
                            </a>  --}}
                             <form id="form{{$des->id}}" action="{{ route('designation.destroy',$des->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0" type="submit" onclick="return confirm('are You confirm?')"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">There is no desertment</td>
                    @endforelse

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{ $designations->links() }}
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
