@extends('admin.master')
@section('title', 'Edit Product')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
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
            <h3 class="card-title">Edit Product</h3>
           
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
         <form action="{{ route('products.update', $product->id)}}" method="POST">
           @csrf
             @method('PATCH')
             <div class="form-group">
                  <label>Category</label>
                <select name="category_id" id="categories" class="form-control">
                  <option value="0">Select Category</option>
                   @foreach($category as $cat)
                   <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                   @endforeach
                </select>
               @if ($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif 
                </div>
                <div class="form-group">
                  <label>Sub Category</label>
                <select name="subcategories" id="subcategory" class="form-control">
                  <option value="0">Select Sub Category</option>
                   @foreach($sub_category as $sub_cat)
                   <option value="{{ $sub_cat->id }}">{{ $sub_cat->name }}</option>
                   @endforeach
                </select>
                @if ($errors->has('subcategories'))
                    <span class="text-danger">{{ $errors->first('subcategories') }}</span>
                @endif 
                </div>
                 <div class="form-group">
                  <label>Brand</label>
                <select name="brand_id" class="form-control">
                  <option value="0">Select brand</option>
                   @foreach($brand as $brands)
                   <option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                   @endforeach
                </select>
                 @if ($errors->has('brand_id'))
                    <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                @endif
                </div>
                <div class="form-group">
                  <label>Product Name</label>
                <input type="text" name="product_name" value="{{ $product->pro_name}}" id="product_name" class="form-control" placeholder="Enter Product Name" >
                 @if ($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                @endif  
                </div>
                 <div class="form-group">
                  <label>Product Code</label>
                <input type="text" name="pro_code" id="pro_code" value="{{ $product->pro_code}}" class="form-control" placeholder="Enter Product Code" >
                 @if ($errors->has('pro_code'))
                    <span class="text-danger">{{ $errors->first('pro_code') }}</span>
                @endif  
                </div>
                <div class="form-group">
                  <label>Price</label>
                <input type="text" name="price" value="{{ $product->price}}" id="price" class="form-control" placeholder="Enter Price" >
                 @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif  
                </div>
                 <div class="form-group">
                  <label>Quantity</label>
                <input type="text" name="quantity" value="{{ $product->quantity}}" id="quantity" class="form-control" placeholder="Enter Quantity" >
                 @if ($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif  
                </div>
                 <div class="form-group">
                  <label>Product Color</label>
                <input type="text" name="pro_color" value="{{ $product->pro_color}}" id="pro_color" class="form-control" placeholder="Enter Product Color" >
                 @if ($errors->has('pro_color'))
                    <span class="text-danger">{{ $errors->first('pro_color') }}</span>
                @endif  
                </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" >
                  </div>
          <div class="form-group">
          <label>Category Description</label>
          <textarea name="description" class="form-control" id="category_description" cols="30" rows="10">{{ $product->description }}</textarea>
          </div>
              <div class="form-group">
              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1">Active</option>
                   <option value="0">Inactive</option>
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
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function()
{
$("#categories").change(function()
{
var category_id=$(this).val();
//alert(category_id);
 $.ajax({
    type: "POST",
    url: "{{ route('get_sub_category')}}",
    data: { id: category_id, _token: '{{csrf_token()}}' },
    success: function (data) {
         $('#subcategory').html(data);
    },
    error: function (data, textStatus, errorThrown) {
        console.log(data);

    },
});
 
});
});
</script>