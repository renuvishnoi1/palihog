@extends('admin.master')
@section('title', 'Edit User')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
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
            <h3 class="card-title">Edit User</h3>
           
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
         <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
                <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" id="brand_name" class="form-control" value="{{  $user->first_name }}" placeholder="Enter First Name" >
                  </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" id="last_name" class="form-control" value="{{  $user->last_name }}" placeholder="Enter Last Name" >
                  </div>
             
               <div class="form-group">
                 <label> Email</label>                
                 <input type="text" name="email" class="form-control" value="{{ $user->email }}">  
                 @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif                     
               </div>
              <div class="form-group">                 
                 <label>Phone Number </label>                
                <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}">   
                @if ($errors->has('phone_number'))
                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif                      
               </div>              
            
               <div class="form-group">                
                 <label>Password </label>                
                <input type="text" name="password" class="form-control" >  
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif                        
               </div>
               <div class="form-group">
                 <label>Confirm Password</label>                
                  <input type="text" name="c_password" class="form-control" > 
                  @if ($errors->has('c_password'))
                    <span class="text-danger">{{ $errors->first('c_password') }}</span>
                @endif               
             
              </div>
              <div class="form-group">
              
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="1" <?php if ($user->status == '1') { echo 'selected'; }?>>Active</option>
                   <option value="0" <?php if ($user->status == '0') { echo 'selected'; }?>>Inactive</option>
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