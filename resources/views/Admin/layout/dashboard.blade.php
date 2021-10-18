@extends('Admin.layout.pant')
@section('body')
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>
    
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ url('admin/chat') }}">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">{{ session('count') }}</span>
            </a>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <!-- Sidebar user panel (optional) -->
              <div class="user-panel pb-3 d-flex">
                <div class="image">
                  <img src="{{ asset('backend/dist/img/'.Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
                <div class="info">
                  <a href="{{ url('admin/logout') }}" class="d-block"><i class="fas fa-sign-out-alt"></i> logout</a>
                </div>
              </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          
    
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a data-pjax href="{{ url('admin') }}" class="menu nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a data-pjax href="{{ url('admin/users') }}" class="menu nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Quản lý người dùng
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a data-pjax href="{{ url('admin/slides') }}" class="menu nav-link">
                  <i class="nav-icon fas fa-sliders-h"></i>
                  <p>
                    Quản lý slides
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a data-pjax href="{{ url('admin/categories') }}" class="menu nav-link">
                  <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>
                    Quản lý danh mục
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="menu nav-link">
                  <i class="nav-icon fas fa-box-open"></i>
                  <p>
                    Quản lý sản phẩm
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <li class="nav-item">
                      <a href="{{ url('admin/products') }}" class="nav-link">
                        <i class="fas fa-boxes nav-icon"></i>
                        <p>Sản phẩm</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('admin/product-details') }}" class="nav-link">
                        <i class="fas fa-box-tissue nav-icon"></i>
                        <p>Chi tiết sản phẩm</p>
                      </a>
                    </li>
                   
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
      @yield('section')

      @include('Admin.layout.footer')
  </div>
@stop

