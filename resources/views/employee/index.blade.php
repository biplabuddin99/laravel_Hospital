@extends('app')
@section('content')
<main id="main" class="main">

    <section class="section">
        <div class="panel-heading mt-5">
            <div class="btn-group">

                <a href="{{route('employee.show',6)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Accountant List </a>

                <a href="{{route('employee.show',5)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Laboratorist List </a>

                <a href="{{route('employee.show',3)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Nurse List </a>

                <a href="{{route('employee.show',4)}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Reciptionist List </a>

            </div>
        </div>
    </section>
</main>


@endsection

