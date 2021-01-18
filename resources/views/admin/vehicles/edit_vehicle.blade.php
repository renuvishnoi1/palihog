@extends('admin.master')
@section('title', 'Edit Vehicle')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Vehicle</h1>
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
            <h3 class="card-title">Edit Vehicle</h3>           
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
         <form action="{{ route('vehicles.update',$vehicle->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name"  class="form-control" value="{{ $vehicle->name }}" >
            @error('name')
           <div class="text text-danger">{{ $message }}</div>
            @enderror
              </div>
                <div class="form-group">
             <label>Vehicle Type</label>
            <select class="form-control" name="vehicle_type">
              @foreach($vehicle_type as $type)
              <option value="{{ $type->id }}" >{{ $type->vehicle_type }}</option>
              @endforeach
            </select>
          </div>      
            <div class="form-group">
            <label>Image</label>
          <input type="file" name="image" id="image" class="form-control" >

            </div>
          <div class="form-group">
            <label>Distance From</label>
            <input type="text" name="distance_from"  class="form-control"  value="{{ $vehicle->distance_from }}" >
            @error('distance_from')
           <div class="text text-danger">{{ $message }}</div>
            @enderror
            
          </div>
          <div class="form-group">
            <label>Distance To</label>
            <input type="text" name="distance_to"  class="form-control" value="{{ $vehicle->distance_to }}" > 
             @error('distance_to')
           <div class="text text-danger">{{ $message }}</div>
            @enderror           
          </div>
         
         
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="price"  class="form-control" value="{{ $vehicle->price }}" >
            @error('price')
           <div class="text text-danger">{{ $message }}</div>
            @enderror
          </div>           
            <div class="form-group">              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1"  <?php if ($vehicle->status == '1') { echo 'selected'; }?>>Active</option>
                   <option value="0"  <?php if ($vehicle->status == '0') { echo 'selected'; }?>>Inactive</option>
                 </select>               
          </div>
                                                            
             <div class="reset-button">
               <input type="submit" name="" class="btn btn-success" value="Edit Vehicle">
                                 
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