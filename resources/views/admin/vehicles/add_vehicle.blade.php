@extends('admin.master')
@section('title', 'Add Vehicle')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Vehicle</h1>
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
            <h3 class="card-title">Add Vehicle</h3>           
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
         <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name"  class="form-control" placeholder="Enter Vehicle Name" required>
                </div>
                 <div class="form-group">
              <label>Type</label>
              <select class="form-control" name="type">
                   <option value="two wheeler"  >two wheeler</option>
                   <option value="three wheeler"  >three wheeler</option>
                   <option value="four wheeler"  >four wheeler</option>
                 </select> 
                </div>
                             
            <div class="form-group">
             <label>Image</label>
              <input type="file" name="image" id="image" class="form-control" >
              </div>
            <div class="form-group">              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1"  >Active</option>
                   <option value="0"  >Inactive</option>
                 </select>               
          </div>                                                            
             <div class="reset-button">
               <input type="submit" name="" class="btn btn-success" value="Add Vehicle">
                                 
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