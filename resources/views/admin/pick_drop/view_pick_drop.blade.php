@extends('admin.master')
@section('title', 'Pick Drop List')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pickup Dropoff Detail</h1>
          </div>
          <div class="col-sm-6">
         <!--    <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
      @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               <!--  <a href="{{ route('categories.create')}}" class="btn btn-success">Add Category</a> -->
                <a href=""></a>

              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>User</th>
                    <th>Category</th>
                    <th>Vehicle</th>
                    <th>Pickup Address</th>
                    <th>Dropoff Address</th>
                    <th>Dropoff Location</th>
                    <th>Phone Number</th>
                    <th>Amount</th>
                    <th>Status</th>                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $pick_drop)
                  <tr>
                    <td> {{ $pick_drop->first_name }} </td>
                    <td>{{ $pick_drop->category_name }}</td>
                    <td>{{ $pick_drop->vehicle }}</td>
                    <td>{{ $pick_drop->pickup_address }}</td>
                    <td>{{ $pick_drop->dropoff_address }}</td>
                    <td>{{ $pick_drop->dropoff_location }}</td>
                    <td>{{ $pick_drop->dropoff_phone_number }}</td>
                    <td>{{ $pick_drop->amount}}</td>                     
                   
                    <td>
                     
                    </td>
                    <td>
                       <form action="{{ route('pick_drop.destroy', $pick_drop->id) }}" method="POST">

                        <a href="{{ route('pick_drop.show', $pick_drop->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <!-- <a href="{{ route('pick_drop.edit', $pick_drop->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a> -->

                        @csrf
                        @method('DELETE')
<!-- 
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button> -->
                    </form>
                    </td>
                   
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>User</th>
                    <th>Category</th>
                    <th>Vehicle</th>
                    <th>Pickup Address</th>
                    <th>Dropoff Address</th>
                    <th>Dropoff Location</th>
                    <th>Phone Number</th>
                    <th>Amount</th>
                    <th>Status</th>                    
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>    @endsection