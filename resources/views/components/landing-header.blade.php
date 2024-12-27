<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex justify-content-between align-items-center">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename" style="white-space: nowrap;">Zeny's Pinangat</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                @if(Auth::user()->role_id == 1)
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @elseif(Auth::user()->role_id == 2)
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li><a href="{{ route('customer.products.index') }}">Products</a></li>
                    <li class="d-xl-none"><a href="{{ route('customer.orders.index') }}">View Order</a></li>
                    <li class="d-xl-none"><a href="{{ route('customer.profile.edit') }}">Edit Profile</a></li>
                    <li class="d-xl-none">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="dropdown">
                        <a class="toggle-dropdown d-none d-xl-block"> My Account</a>
                        <ul>
                            <li><a href="{{ route('customer.profile.edit') }}">Edit Profile</a></li>
                            <li><a href="{{ route('customer.orders.index') }}">View Order</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            </li>
                        </ul>
                    </li>
                @endif
            @endguest
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <a class="btn-getstarted" href="/customer/products">Order Now</a>

    </div>
</header>
