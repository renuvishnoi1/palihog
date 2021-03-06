@extends('admin.master')
@section('title', 'Edit Shop')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Shop</h1>
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
            <h3 class="card-title">Edit Shop</h3>
           
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
         <form action="{{ route('shops.update', $shop->id)}}" method="POST">
            @csrf
             @method('PATCH')
              <div class="form-group">
                  <label>Category</label>
                <select name="category_id" class="form-control">
                   @foreach($category as $cat)
                   <?php 
                  if($cat->id==$shop->category_id){ $select="selected='selected'"; }else{ $select='';} 
                  ?>
                   <option value="{{ $cat->id }}" {{ $select }}>{{ $cat->name }}</option>
                   @endforeach
                </select>
                
                </div>
                <div class="form-group">
                  <label>Shop Name</label>
                <input type="text" name="shop_name" id="shop_name" class="form-control"  value="{{ $shop->shop_name}}" >
                 @if ($errors->has('shop_name'))
                    <span class="text-danger">{{ $errors->first('shop_name') }}</span>
                @endif  
                </div>
              <div class="form-group">                 
                 <label>Phone Number </label>                
                <input type="text" name="phone" class="form-control" value="{{ $shop->phone }}">   
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif                      
               </div>              
            
               <div class="form-group">                
                 <label>Shop Address </label>                
                <input type="text" name="shop_address" class="form-control" value="{{ $shop->shop_address }}">  
                @if ($errors->has('shop_address'))
                    <span class="text-danger">{{ $errors->first('shop_address') }}</span>
                @endif                        
               </div>
               <div class="form-group">                
                 <label>Shop Branch </label>                
                <input type="text" name="shop_branch" class="form-control" value="{{ $shop->shop_branch }}">  
                @if ($errors->has('shop_branch'))
                    <span class="text-danger">{{ $errors->first('shop_branch') }}</span>
                @endif                        
               </div>
              
              <div class="form-group">
              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1"  <?php if ($shop->status == '1') { echo 'selected'; }?>>Active</option>
                   <option value="0"  <?php if ($shop->status == '0') { echo 'selected'; }?>>Inactive</option>
                 </select>
               
             </div>
                         
           <div class="fubmit-button">
           
             <button type="submit" class="btn btn-primary">Submit</button>
             
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