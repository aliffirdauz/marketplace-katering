@php
    use App\Models\Merchant;
    $merchant = App\Models\Merchant::where('user_id', Auth::user()->id)->first();
    $customer = App\Models\Customer::where('user_id', Auth::user()->id)->first();
@endphp

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="{{ url('/') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-light.svg') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($merchant && $merchant->logo)
                        <img class="rounded-circle header-profile-user"
                            src="{{ asset('storage/logos/' . $merchant->logo) }}" alt="Header Avatar"
                            style="width: 40px; height:40px">
                    @else
                        <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/user.png') }}"
                            alt="Header Avatar" style="width: 40px; height:40px">
                    @endif
                    <span class="d-none d-xl-inline-block ms-1" key="t-merchant">
                        {{ $merchant ? $merchant->name : $customer->name }}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    @if ($merchant)
                        <!-- Profile and Logout -->
                        <a class="dropdown-item" href="/profile"><i
                                class="bx bx-user font-size-16 align-middle me-1"></i>
                            <span key="t-profile">Profil</span></a>
                        <div class="dropdown-divider"></div>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                            <span key="t-logout">Keluar</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
