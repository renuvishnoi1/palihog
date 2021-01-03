@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
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
            <h3 class="card-title">Add Category</h3>
           
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
           @if ($errors->has('category_name'))
                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                @endif
         <form action="{{ route('sub_categories.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-6">
                 <label>Category </label>
                
                 <select name="category" class="form-control">
                  @foreach($category as $cat)
                   <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                   @endforeach
                 </select>                         
               </div>
               <div class="col-md-6">
                 <label> Sub Category</label>                
                 <input type="text" name="sub_category" class="form-control">                      
               </div>
             </div>
              </div>
              <div class="row">
               <div class="col-md-12">
                <div class="col-md-6">
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1">Active</option>
                   <option value="0">Inactive</option>
                 </select>
               </div>
             </div>
              </div>
             
           <div class="row">
            <div class="col-md-12">
              <div class="col-md-6">
             <button type="submit" class="btn btn-primary">Submit</button>
               </div>   
            </div>
          </div>
           </form>
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