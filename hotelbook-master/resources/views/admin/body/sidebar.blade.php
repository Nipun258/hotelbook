@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">
      <h3 style="color:white"><b>Hotel</b>Book</h3>
      {{-- <p style="color:white;font-size:13px;text-align: center;font-weight: bold;">UNIVERSITY OF SRI JAYEWARDENEPURA</p></span> --}}
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ (!empty(Auth::user()->photo))? asset(Auth::user()->photo):url('upload/images.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="" class="d-block">
          @auth
          {{ strtoupper(auth()->user()->name) }}
          @endauth
        </a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $route == 'admin.dashboard'? 'active': '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>

        </li>
        <li class="nav-item">
            <a href="#" class="nav-link {{ $prefix == '/profile'? 'active': '' }}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">1</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.profile.view')}}" class="nav-link {{ $route == 'profile.view'? 'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.password.change')}}" class="nav-link {{ $route == 'password.view'? 'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>



      <li class="nav-header"></li>
      <li class="nav-item ">
        <a type="button" class="nav-link bg-danger" data-toggle="modal" data-target="#exampleModalCenter">
          <i class="nav-icon fas fa-power-off text-white"></i>
          <p class="text">Logout</p>
        </a>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">User Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Are you realy want to logout system?</h6>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-rounded btn-danger" data-dismiss="modal">Cancel</a>
        <a type="submit" href="{{ route('admin.logout') }}" class="btn btn-rounded btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>
