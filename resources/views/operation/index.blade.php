@extends('app')
@section('content')

<main id="main" class="main">

            <div class="pagetitle">
              <h1>Operation Tables</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item">Tables</li>
                  <li class="breadcrumb-item active">Operation</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="panel-heading"><a href="{{ route('operation.create') }}" class="btn btn-md btn-success list-btn mb-3"><i class="fa fa-plus"></i> Add Operation Report </a></div>

        <section class="section">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="table-responsive">
                      <h5 class="card-title">Operation List</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable">
                          <thead>
                            <tr>
                              <th scope="col">#SL</th>
                              <th scope="col">Patient Name</th>
                              <th scope="col">Father's Name</th>
                              <th scope="col">Mother's Name</th>
                              <th scope="col">Gender</th>
                              <th scope="col">Birth Date</th>
                              <th scope="col">Blood</th>
                              <th scope="col">Reference Doctor</th>
                              <th scope="col">Address</th>
                              <th scope="col">Operation Date</th>
                              <th scope="col">OT No</th>
                              <th scope="col">Description</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>

                          <tbody>
                              @forelse($operation_table as $d)
                              <tr>
                                <th>{{ ++$loop->index }}</th>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->father_name }}</td>
                                <td>{{ $d->mother_name }}</td>
                                <td>{{ $d->gender }}</td>
                                <td>{{ $d->dob }}</td>
                                <td>{{ $d->blood }}</td>
                                <td>{{ $d->doctor_ref }}</td>
                                <td>{{ $d->address }}</td>
                                <td>{{ $d->opr_date }}</td>
                                <td>{{ $d->ot_no }}</td>
                                <td>{{ $d->description }}</td>
                                <td>@if($d->status==1) Active @else Inactive @endif</td>
                                <td class="d-flex">
                                  <a href="{{ route('operation.edit',$d->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  &nbsp;
                                  <form id="form{{$d->id}}" action="{{ route('operation.destroy',$d->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn p-0 show_confirm" data-toggle="tooltip" type="submit"><i class='bi bi-trash' style='color: red'></i></a></button>
                                </form>
                                <a style="padding-right:8px" href="{{ route('operation.show',$d->id) }}">
																	<i class="fa fa-eye"></i>
																	</a>
                              </td>
                            </tr>
                                  @empty
                              <tr>
                                <td scope="col" colspan="14" style="text-align:center">No data found</td>
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
