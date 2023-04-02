 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/admin/dashboard" class="brand-link">
      <img src="{{ asset('assets/backend/dist/')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blog System</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/backend/dist/')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">@auth {{Auth::user()->name ?? ''}} @endauth</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <router-link to="/admin/dashboard" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              
              </p>
            </router-link>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Category
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/category-add" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Category Add</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/category" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                   <p>Category List</p>
                </router-link>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Post
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin/post-add" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Post Add</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/admin/post" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                   <p>Post List</p>
                </router-link>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>