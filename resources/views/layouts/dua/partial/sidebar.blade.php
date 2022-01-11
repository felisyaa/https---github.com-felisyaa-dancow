
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
      <i class="fa fa-user-graduate"></i>
      <span class="brand-text font-weight-light">Quiz</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/storage/' . auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/dashboard/user" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @can ('isAdmin', auth()->user())
          <li class="nav-item">
            <a href="/dashboard/admin" class="nav-link {{ (request()->is('dashboard/admin')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="/" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          @can('isAdmin', auth()->user())
          <li class="nav-item">
            <a href="/m1" class="nav-link {{ (request()->is('/m1')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Buat Materi 1
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/m2" class="nav-link {{ (request()->is('/m2')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Buat Materi 2
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/m3" class="nav-link {{ (request()->is('/m3')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Buat Materi 3
              </p>
            </a>
          </li>
          @endcan
          {{-- <li class="nav-item">
            <a href="/m3" class="nav-link {{ (request()->is('/m3')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                LeaderBoard
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>