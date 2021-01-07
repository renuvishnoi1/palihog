@extends('admin.master')
@section('title', 'Edit Brand')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Brand</h1>
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
            <h3 class="card-title">Edit Brand</h3>
           
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
           @if ($errors->has('brand_name'))
                    <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                @endif
                <div class="panel-body">
         <form action="{{ route('brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              
                 <label>Brand Name</label>
                 <input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name}}">     
                  
              
              </div>
              <div class="form-group">
                                 <label>Image</label>
                                 <input type="file" name="image" id="image" class="form-control" >
                              </div> 
              <div class="form-group">
              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1" <?php if ($brand->status == '1') { echo 'selected'; }?> >Active</option>
                   <option value="0" <?php if ($brand->status == '0') { echo 'selected'; }?> >Inactive</option>
                 </select>
               
          </div>
           <div class="form-group">
              <div class="col-md-6">
             <button type="submit" class="btn btn-primary">Submit</button>
               </div>   
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