@extends('admin.master')
@section('title', 'Add User')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
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
            <h3 class="card-title">Add User</h3>
           
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
          
         <form action="{{ route('users.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-6">
                 <label>User Name </label>                
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                 @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif                         
               </div>
               <div class="col-md-6">
                 <label> Email</label>                
                 <input type="text" name="email" class="form-control" value="{{ old('email') }}">  
                 @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif                     
               </div>
             </div>
            
              </div>
              <div class="row">
                 <div class="col-md-12">
              <div class="col-md-6">
                 <label>Phone Number </label>                
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">   
                @if ($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif                      
               </div>
               <div class="col-md-6">
                 <label>User Type</label>                
                 <select class="form-control" name="type">
                  <option value="">Plase Select Type</option>
                    <option value="2">User</option>
                   <option value="3">Rider</option>
                 </select>    
                  @if ($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif                    
               </div>
             </div>
              </div>
               <div class="row">
                 <div class="col-md-12">
              <div class="col-md-6">
                 <label>Password </label>                
                <input type="text" name="password" class="form-control" >  
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif                        
               </div>
               <div class="col-md-6">
                 <label>Confirm Password</label>                
                  <input type="text" name="c_password" class="form-control" > 
                  @if ($errors->has('c_password'))
                    <span class="text-danger">{{ $errors->first('c_password') }}</span>
                @endif               
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