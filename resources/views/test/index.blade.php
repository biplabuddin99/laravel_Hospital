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
    <div class="panel-heading"><a href="{{route('test.create')}}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Test </a></div>

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List of Test</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#SL No</th>
                    <th scope="col">Test Category</th>
                    <th scope="col">Test Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($test as $t)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $t->test_category->name }}</td>
                        <td>{{ $t->name }}</td>
                        <td>{{ $t->price }}</td>
                        <td>{{ $t->description }}</td>
                        <td>@if($t->status==1) Active @else Inactive @endif</td>
                        <td class="d-flex">
                            <a href="{{ route('test.edit',$t->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form id="form{{$t->id}}" action="{{ route('test.destroy',$t->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn p-0" type="submit" onclick="return confirm('are You confirm?')"><i class='bi bi-trash-fill' style='color:red'></i></a></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="7" class="text-center">There is no Data</td>
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
