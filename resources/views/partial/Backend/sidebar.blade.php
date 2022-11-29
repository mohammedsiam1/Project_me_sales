 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('order.admin')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/categories')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/brands')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('products.create')}}">Add Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('products.index')}}">View Products</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('colors.index')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Colors</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('sliders.index')}}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Sliders</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('sitting.index')}}">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Sitting</span>
            </a>
          </li>
     
         
        </ul>
      </nav>