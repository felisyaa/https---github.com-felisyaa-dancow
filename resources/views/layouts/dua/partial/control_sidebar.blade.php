<aside class="control-sidebar control-sidebar-dark">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/storage/' . auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="/" class="nav-link btn-light">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dashboard/user" class="nav-link btn-light">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Setting
            </p>
          </a>
        </li>
        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </li>
       </ul>
</aside>