<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::is('users.index') ? 'active' : 'collapsed' }}" href="{{ route('users.index') }}">
                <i class="bi bi-person"></i>
                <span>User Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a
                class="nav-link {{ Route::is('products.index', 'materials.index') ? '' : 'collapsed' }}"
                data-bs-target="#forms-nav"
                data-bs-toggle="collapse"
                href="#"
            >
                <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul
                id="forms-nav"
                class="nav-content collapse {{ Route::is('products.index', 'materials.index') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav"
            >
                <li>
                    <a href="{{ route('products.index') }}" class="{{ Route::is('products.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Product Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('materials.index') }}" class="{{ Route::is('materials.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Stock Management</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::is('orders.index') ? 'active' : 'collapsed' }}" href="{{ route('orders.index') }}">
                <i class="bi bi-cart"></i>
                <span>Order Management</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::is('income-statement') ? 'active' : 'collapsed' }}" href="{{ route('income-statement') }}">
                <i class="bi bi-bar-chart"></i>
                <span>Income Statement</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Route::is('messages') ? 'active' : 'collapsed' }}" href="{{ route('messages') }}">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
            </a>
        </li>
    </ul>
</aside>
<!-- End Sidebar -->
