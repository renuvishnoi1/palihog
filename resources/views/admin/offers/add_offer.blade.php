@extends('admin.master')
@section('title', 'Add Shop')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Shop</h1>
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
            <h3 class="card-title">Add Offer</h3>
           
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
         <form action="{{ route('offers.store')}}" method="POST">
            @csrf
            
                <div class="form-group">
                  <label>Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" >
                 @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif  
                </div>
              <div class="form-group">                 
                 <label>Min Order Value</label>                
                <input type="text" name="min_order_value" class="form-control" value="{{ old('min_order_value') }}">   
                @if ($errors->has('min_order_value'))
                    <span class="text-danger">{{ $errors->first('min_order_value') }}</span>
                @endif                      
               </div>              
            div class="form-group">                 
                 <label>Max Discount Amount</label>                
                <input type="text" name="max_discoun_amount" class="form-control" value="{{ old('max_discoun_amount') }}">   
                @if ($errors->has('max_discoun_amount'))
                    <span class="text-danger">{{ $errors->first('max_discoun_amount') }}</span>
                @endif                      
               </div> 
               <div class="form-group">                 
                 <label>Type/label>                
                <input type="text" name="type" class="form-control" value="{{ old('type') }}">   
                @if ($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif                      
               </div>
               <div class="form-group">                 
                 <label>Promo Code/label>                
                <input type="text" name="promo_code" class="form-control" value="{{ old('promo_code') }}">   
                @if ($errors->has('promo_code'))
                    <span class="text-danger">{{ $errors->first('promo_code') }}</span>
                @endif                      
               </div> 
                 <div class="form-group">                 
                 <label>Description</label>                
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">   
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif                      
               </div>
                <div class="form-group">                 
                 <label>Short Description</label>                
                <input type="text" name="description" class="form-control" value="{{ old('short_description') }}">   
                @if ($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif                      
               </div>
                <div class="form-group">                 
                 <label>Long Description</label>                
                <input type="text" name="long_description" class="form-control" value="{{ old('long_description') }}">   
                @if ($errors->has('long_description'))
                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                @endif                      
               </div> 
               <div class="form-group">                 
                 <label>Expiry Date</label>                
                <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}">   
                @if ($errors->has('expiry_date'))
                    <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                @endif                      
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