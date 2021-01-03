@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Custom Fields</h1>
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
            <h3 class="card-title">Add Custom Fields</h3>

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
         
           <div class="saveDataWrap">
  <button id="saveData" type="button">External Save Button</button>
</div>
  <div id="build-wrap"></div>
        
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
@stack('scripts')
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script  src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script type="text/javascript">
  jQuery($ => {
  const fbTemplate = document.getElementById('build-wrap');
  $(fbTemplate).formBuilder();
  
    
});
</script>
@endstack
@endsection