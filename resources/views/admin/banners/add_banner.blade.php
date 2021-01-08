@extends('admin.master')
@section('title', 'Add Banner')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Banner</h1>
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
            <h3 class="card-title">Add Banner</h3>
           
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
         <form action="{{ route('banners.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
              <label>Heading</label>
              <input type="text" name="heading"  class="form-control" placeholder="Enter Heading" required>
                </div>
                 <div class="form-group">
              <label>Sub Heading</label>
              <input type="text" name="sub_heading"  class="form-control" placeholder="Enter Sub Heading" required>
                </div>
                             
            <div class="form-group">
             <label>Image</label>
              <input type="file" name="banner_image" id="image" class="form-control" >
              </div>
            <div class="form-group">              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1"  >Active</option>
                   <option value="0"  >Inactive</option>
                 </select>               
          </div>
                                                            
             <div class="reset-button">
               <input type="submit" name="" class="btn btn-success" value="Add Brand">
                                 
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