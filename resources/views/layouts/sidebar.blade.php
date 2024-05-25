<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link mb-2">
        <img src="{{ asset('assets/img/default.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; max-width: 48px;">
        <span class="brand-text font-weight-light">Technical Test</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->role == 'admin')
                    <img src="{{ asset('assets/img/user.png') }}" class="img-circle elevation-2" alt="User Image" />
                @else
                    <img src="{{ asset('assets/img/user2.png') }}" class="img-circle elevation-2" alt="User Image" />
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">FEATURES</li>
                <li class="nav-item {{ Request::is('customer*') || Request::is('supplier*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('customer*') || Request::is('supplier*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Contact
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-primary right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customer.index') }}"
                                class="nav-link {{ Request::is('customer*') ? 'active' : '' }}">
                                <p class="ml-3">Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('supplier.index') }}"
                                class="nav-link {{ Request::is('supplier*') ? 'active' : '' }}">
                                <p class="ml-3">Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index2', ['active']) }}"
                        class="nav-link {{ Route::is('product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales.index') }}" class="nav-link {{ Route::is('sales*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('purchase.index') }}"
                        class="nav-link {{ Route::is('purchase*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Purchase
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penerimaan.index') }}"
                        class="nav-link {{ Route::is('penerimaan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Penerimaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('inventory.index') }}"
                        class="nav-link {{ Route::is('inventory*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Inventory
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
