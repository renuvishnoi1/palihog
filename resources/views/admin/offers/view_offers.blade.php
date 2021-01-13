@extends('admin.master')
@section('title', 'offers List')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer</h1>
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
                <a href="{{ route('offers.create')}}" class="btn btn-success">Add Offer</a>
                <a href=""></a>

              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    
                    <th>Image</th>                   
                    <th>Status</th>                   
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $offer)
                  <tr>
                    <td>{{ $offer->name }}</td>
                    <td><img src="{{ $offer->image }}" alt="" width="50" height="50"></td>
                   
                    
                    <?php if($offer->status =='1'){
                      $status='Active';

                    }else{
                      $status='Inactive';
                    }?>
                    <td>
                      {{ $status }}
                    </td>
                    <td>
                       <form action="{{ route('offers.destroy', $offer->id) }}" method="POST">

                       <!--  <a href="{{ route('offers.show', $offer->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a> -->

                        <a href="{{ route('offers.edit', $offer->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                    </td>
                   
                  </tr>
                  @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    
                    <th>Image</th>                   
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
  </div>   
  @stack('scripts')
 
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );

  </script>
  @endstack
   @endsection
