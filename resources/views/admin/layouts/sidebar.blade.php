<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open ">
            <a href="{{ route('dashboard')}}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard               
              </p>
            </a>
           
          </li>
           <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
               User Management               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{ route('categories.index')}}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list"></i>
              <p>
               Category               
              </p>
            </a>
          </li>         
          <li class="nav-item">
            <a href="{{ route('brands.index') }}" class="nav-link {{ Request::is('brands*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Brands               
              </p>
            </a>
          </li>

         <!--   <li class="nav-item">
            <a href="{{ route('shops.index') }}" class="nav-link {{ Request::is('shops*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Shops               
              </p>
            </a>
          </li> --> 
           <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Products               
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('offers.index') }}" class="nav-link {{ Request::is('offers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               offers               
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                General Setting
                <i class="fas fa-angle-left right"></i>               
              </p>
            </a>
            <ul class="nav nav-treeview">             
              <li class="nav-item ">
                <a href="{{ route('banners.index') }}" class="nav-link {{ Request::is('banners*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('privacy.index') }}" class="nav-link {{ Request::is('privacy*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('aboutus.index') }}" class="nav-link {{ Request::is('aboutus*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About US</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vehicle_types.index') }}" class="nav-link {{ Request::is('vehicle_types*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicle Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('vehicles.index') }}" class="nav-link {{ Request::is('vehicles*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vehicles</p>
                </a>
              </li>
             
            </ul>
          
          </li>
             <li class="nav-item">
            <a href="{{ route('pick_drop.index') }}" class="nav-link {{ Request::is('pick_drop*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Order Details               
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Shop
                <i class="fas fa-angle-left right"></i>               
              </p>
            </a>
            <ul class="nav nav-treeview">             
              <li class="nav-item ">
                <a href="{{ route('shop_category.index') }}" class="nav-link {{ Request::is('shop_category*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shop Category</p>
                </a>
              </li>
              
           
             
            </ul>
          
          </li>
          
        
       
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>