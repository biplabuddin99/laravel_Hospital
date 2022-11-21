@extends('app')
@section('content')
<main id="main" class="main">
    <section class="section">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

        <div class="row">
          <!-- left column -->
            <div class="col-md-12">
              <div class="title">Update Shift</div>
              <div class="box box-info">
                <div class="panel panel-default">
                
                  <div class="panel-heading">
                    <a href="{{route('shift.index')}}" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Shift List </a>
                  </div>
                  
                  <div class="panel-body">
                  
                    <form class="form-horizontal" action="{{route('shift.update',$shift->id)}}" method="post">
                    @csrf
                    @method('patch')
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="ShiftName">Shift Name <span style="color:red">* </span>:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ShiftName" name="ShiftName" value="{{old('ShiftName',$shift->name)}}">
                        {{-- <div class="error" style="color:red;font-style:italic;">{{ $errors->first('ShiftName') }}</div> --}}
                      </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="control-label col-sm-3" for="time">Time<span style="color:red">* </span> :</label>
                        <div class="row">
                            <div class="col-3" style="float:left">
                              <label for="start_time">Start Time:</label>
                              <input type="time" class="" name="start_time" id="start_time" value="{{ $shift->start }}">
        
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <div class="col-3">
                              <label for="end_time">End Time:</label>
                              <input type="time" class="" name="end_time" id="end_time" value="{{ $shift->end }}">
        
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                      <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <span class="btn or">or</span>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
      
    </section>
</main>
@endsection
