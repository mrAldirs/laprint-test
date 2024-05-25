<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                @if (Auth::user()->role == 'admin')
                    <span class="d-none d-sm-inline-block">Admin</span>
                    <img src="{{ asset('assets/img/user.png') }}" class="img-circle elevation-2" alt="User Image"
                        style="width: 30px; height: 30px;" />
                @else
                    <span class="d-none d-sm-inline-block">User</span>
                    <img src="{{ asset('assets/img/user2.png') }}" class="img-circle elevation-2" alt="User Image"
                        style="width: 30px; height: 30px;" />
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">Settings</span>
                <div class="dropdown-divider"></div>
                <a href="#" id="logoutBtn" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
