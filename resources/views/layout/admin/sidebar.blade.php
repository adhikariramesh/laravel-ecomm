<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item nav-category">Products and Sliders</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Products Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/products')}}">Show Products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/add/products')}}">Add Products</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">Slider Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/sliders')}}">Show Slider</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/add/sliders')}}">Add Slider</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">Categories</li>
      <li class="nav-item">
        <a class="nav-link"  href="{{url('/admin/add/category')}}" >
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Add Category</span>
          <i class="menu-arrow"></i>
        </a>

        <a class="nav-link"  href="{{url('/admin/category')}}">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">show Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Brands and Colors</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Brands</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/brand')}}">Show Brands</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/admin/add/brand')}}">Add Brands</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Colors</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/add/color')}}">Add Colors</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/color')}}">Show Colors</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
