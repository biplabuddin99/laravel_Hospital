@extends('app')
@section('title','Room')

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
    <div class="panel-heading"><a href="{{route('roomCategory.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Room Category </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Room Categoroy</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#SL No</th>
                    <th scope="col">Room Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($roomcat as $room)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $room->name }}</td>
                        <td>@if($room->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('roomCategory.edit',$room->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="javascript:void()" onclick="$('#form{{$room->id}}').submit()">
                                <i class="fa fa-trash"></i>
                            </a> --}}
                            <form id="form{{$room->id}}" action="{{ route('roomCategory.destroy',$room->id) }}" method="POST">
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
              <!-- End Table with stripped rows -->
              {{-- {{ $roomcat->links() }} --}}
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
