@extends('admin.master')
@section('title', 'Add Type')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Type</h1>
          </div>
          <div class="col-sm-6">
           <!--  <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Type</h3>
           
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->          
          <div class="panel-body">
         <form action="{{ route('vehicle_types.store')}}" method="POST" >
            @csrf
          <div class="form-group">
              <label>Type</label>
             <input type="text" name="vehicle_type" id="vehicle_type" class="form-control" placeholder="Enter Vehicle Type" >
              @error('vehicle_type')
                 <div class="text text-danger">{{ $message }}</div>
                  @enderror

               </div>
                             
                <div class="form-group">
                <label>Weight</label>
                <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter Weight" >
                  </div>                          
                 <div class="submit-button">
                  <input type="submit" name="" class="btn btn-success" value="Add Type">
                                 
                              </div>
                           </form>
         </div>

          <!-- /.card-body -->
          <div class="card-footer">
          
          </div>
        </div>
        <!-- /.card -->    

        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection