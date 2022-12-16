@extends('app')
@section('title','roomlst')

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
    <div class="panel-heading"><a href="{{route('roomList.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Room List </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Room</h5>

              <!-- Table with stripped rows -->
              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#SL No</th>
                    <th scope="col">Room Category</th>
                    <th scope="col">Room No</th>
                    <th scope="col">Floor No</th>
                    <th scope="col">Description</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($roomlist as $rm)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $rm->room_category->name }}</td>
                        <td>{{ $rm->room_no }}</td>
                        <td>{{ $rm->floor_no}}</td>
                        <td>{{ $rm->description }}</td>
                        <td>{{ $rm->capacity }}</td>
                        <td>{{ $rm->price }}</td>
                        <td>@if($rm->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('roomList.edit',$rm->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            {{-- <a href="javascript:void()" onclick="$('#form{{$rm->id}}').submit()">
                                <i class="fa fa-trash"></i>
                            </a> --}}
                            <form id="form{{$rm->id}}" action="{{ route('roomList.destroy',$rm->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="7" class="text-center">There is no Room</td>
                    @endforelse

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{-- {{ $roomlist->links() }} --}}
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
