<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/categoryview') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Category</span>
        </a>
      </li>

      

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/addproducts') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Add products</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('/showproducts') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Show products</span>
        </a>
      </li>

    </ul>
  </nav>