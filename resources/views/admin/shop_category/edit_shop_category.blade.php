@extends('admin.master')
@section('title', 'Edit Shop Category')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Shop Category</h1>
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
            <h3 class="card-title">Edit Shop Category</h3>
           
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
           @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                  <div class="panel-body">
         <form action="{{ route('shop_category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
             <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" name="name" id="category_name" class="form-control" value="{{$category->name }}" placeholder="Enter Category Name" required>
                              </div>
                      <div class="form-group">
              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1" <?php if ($category->status == '1') { echo 'selected'; }?> >Active</option>
                   <option value="0" <?php if ($category->status == '0') { echo 'selected'; }?> >Inactive</option>
                 </select>
               
          </div>                             
                              <div class="reset-button">
                                <input type="submit" name="" class="btn btn-success" value="Add Category">
                                 
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