@extends('admin.master')
@section('title', 'Show Pick Drop')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Show Pick Drop</h1>
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
            <h3 class="card-title">Show Pick Drop</h3>
           
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
           
             <table style="width:50%">
              
               <tr>
                <th>User :</th>
                <td>{{ $pick_drop->first_name }}</td>
                <th>Category :</th>
                <td>{{ $pick_drop->category_name }}</td>
              </tr>
           
              <tr>
                <th>Vehicle :</th>
                <td>{{ $pick_drop->vehicle }}</td>
                <th>Pickup Address :</th>
                <td>{{ $pick_drop->pickup_address }}</td>
              </tr>
              <tr>
                <th>Dropoff Address :</th>
                <td>{{ $pick_drop->dropoff_address }}</td>
                <th>Dropoff Location :</th>
                <td>{{ $pick_drop->dropoff_location }}</td>
              </tr>
             <tr>
               <th>Phone Number :</th>
               <td>{{ $pick_drop->dropoff_phone_number }}</td>
               <th>Amount :</th>
               <td>{{ $pick_drop->amount }}</td>
             </tr>
             </table>
         
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