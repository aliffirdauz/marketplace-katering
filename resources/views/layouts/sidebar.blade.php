<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @if (Auth::user()->role == 'merchant')
                    <li>
                        <a href="{{ '/' }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dasbor</span>
                        </a>
                    </li>

                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{ '/menu' }}" class="waves-effect">
                            <i class="bx bx-food-menu"></i>
                            <span key="t-menu-managements">Pengelolaan Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ '/transaction' }}" class="waves-effect">
                            <i class="bx bx-cart-alt"></i>
                            <span key="t-order-lists">Daftar Pesanan</span>
                        </a>
                    </li>
                @elseif (Auth::user()->role == 'customer')
                    <li>
                        <a href="{{ '/order' }}" class="waves-effect">
                            <i class="bx bx-food-menu"></i>
                            <span key="t-menu-managements">Daftar Menu</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ '/mytransaction' }}" class="waves-effect">
                            <i class="bx bx-cart-alt"></i>
                            <span key="t-order-lists">Daftar Pesanan</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
