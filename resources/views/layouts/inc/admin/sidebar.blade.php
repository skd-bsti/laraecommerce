<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Sales</span>
        </a>
      </li>

      {{-- Categories --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#cat" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title " >Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="cat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}"> view Categories </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('category.create') }}"> Add Categories </a></li>
          </ul>
        </div>
      </li>
      {{--end of categories  --}}
      {{--  Product list--}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#prod" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Products list</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="prod">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}"> view Product </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('product.create') }}"> Add Product </a></li>
          </ul>
        </div>
      </li>
      {{-- end product list --}}
      {{-- Brand list --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Brand list</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="brand">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('brand.index') }}"> view Brand </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('brand.index') }}"> Add Brand </a></li>
          </ul>
        </div>
      </li>
      {{--end of Brand list  --}}
      {{-- colors --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#color" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">colors list</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="color">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('color.index') }}"> view Colors </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('color.create') }}"> Add colors </a></li>
          </ul>
        </div>
      </li>
      {{-- colors --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
