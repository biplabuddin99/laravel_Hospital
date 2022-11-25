@extends('app')
@section('content')

<main id="main" class="main">

            <div class="pagetitle">
              <h1>Child Tables</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item">Tables</li>
                  <li class="breadcrumb-item active">Child</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="panel-heading"><a href="{{ route('birth.create') }}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Birth Child </a></div>

        <section class="section">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Child List</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">#SL</th>
                              <th scope="col">Child Name</th>
                              <th scope="col">Father's Name</th>
                              <th scope="col">Mother's Name</th>
                              <th scope="col">Child Gender</th>
                              <th scope="col">Birth Date</th>
                              <th scope="col">Blood</th>
                              <th scope="col">Reference Doctor</th>
                              <th scope="col">Address</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>

                          <tbody>
                              @forelse($birth_table as $b)
                              <tr>
                                <th>{{ ++$loop->index }}</th>
                                <td>{{ $b->name }}</td>
                                <td>{{ $b->father_name }}</td>
                                <td>{{ $b->mother_name }}</td>
                                <td>{{ $b->gender }}</td>
                                <td>{{ $b->dob }}</td>
                                <td>{{ $b->blood }}</td>
                                <td>{{ $b->doctor_ref }}</td>
                                <td>{{ $b->address }}</td>
                                <td>@if($b->status==1) Active @else Inactive @endif</td>
                                <td class="d-flex">
                                  <a href="{{ route('birth.edit',$b->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  &nbsp;
                                  <form id="form{{$b->id}}" action="{{ route('birth.destroy',$b->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash' style='color: red'></i></a></button>
                                </form>
                                <a style="padding-right:8px" href="{{ route('birth.show',$b->id) }}">
																	<i class="fa fa-eye"></i>
																	</a>
                              </td>
                            </tr>
                                  @empty
                              <tr>
                                <td scope="col" colspan="12" style="text-align:center">No data found</td>
                              </tr>
                                  @endforelse
                          </tbody>
                        </table>
								    </div>
							   </div>
						    </div>
					    </div>
        </section>
  </main>

@endsection
