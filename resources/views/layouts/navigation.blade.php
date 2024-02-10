<ul>
    {{-- Dashboard --}}
    <li class="nav-item my-3 @if (request()->routeIs("home")) active shadow rounded-2 @endif">
        <a href="{{ route("home") }}">
            <span class="icon-v2 mx-3">
                <i class="fa-solid fa-chart-pie"></i>
            </span>
            <span class="text">{{ __("Dashboard") }}</span>
        </a>
    </li>
    {{-- Products --}}
    <li class="nav-item my-3 @if (request()->is("products*")) active shadow rounded-2 @endif">
        <a href="{{ route("products.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-box"></i>
            </span>
            <span class="text">{{ __("Products") }}</span>
        </a>
    </li>
    {{-- Categories --}}
    <li class="nav-item my-3 @if (request()->is("categories*")) active shadow rounded-2 @endif">
        <a href="{{ route("categories.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-tags"></i>
            </span>
            <span class="text">{{ __("Categories") }}</span>
        </a>
    </li>
    {{-- Brands --}}
    <li class="nav-item my-3 @if (request()->is("brands*")) active shadow rounded-2 @endif">
        <a href="{{ route("brands.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-certificate"></i>
            </span>
            <span class="text">{{ __("Brands") }}</span>
        </a>
    </li>
    {{-- Units --}}
    <li class="nav-item my-3 @if (request()->is("units*")) active shadow rounded-2 @endif">
        <a href="{{ route("units.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-weight-hanging"></i>
            </span>
            <span class="text">{{ __("Units") }}</span>
        </a>
    </li>
    {{-- Suppliers --}}
    <li class="nav-item my-3 @if (request()->is("suppliers*")) active shadow rounded-2 @endif">
        <a href="{{ route("suppliers.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-parachute-box"></i>
            </span>
            <span class="text">{{ __("Suppliers") }}</span>
        </a>
    </li>
    {{-- Stocks --}}
    <li class="nav-item my-3 @if (request()->is("stocks*")) active shadow rounded-2 @endif">
        <a href="{{ route("stocks.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-cubes"></i>
            </span>
            <span class="text">{{ __("Stocks") }}</span>
        </a>
    </li>
    {{-- Customers --}}
    <li class="nav-item my-3 @if (request()->is("customers*")) active shadow rounded-2 @endif">
        <a href="{{ route("customers.index") }}">
            <span class="icon-v2 mx-3">
                <i class="fa-solid fa-users"></i>
            </span>
            <span class="text">{{ __("Customers") }}</span>
        </a>
    </li>
    {{-- Purchases --}}
    <li class="nav-item my-3 @if (request()->is("purchases*")) active shadow rounded-2 @endif">
        <a href="{{ route("purchases.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fas fa-shopping-cart"></i>
            </span>
            <span class="text">{{ __("Purchases") }}</span>
        </a>
    </li>
    {{-- Orders --}}
    <li class="nav-item my-3 @if (request()->is("orders*")) active shadow rounded-2 @endif">
        <a href="{{ route("orders.index") }}">
            <span class="icon-v2 mx-3">
                <i class="c-sidebar-nav-icon fa-solid fa-list-check"></i>
            </span>
            <span class="text">{{ __("Orders") }}</span>
        </a>
    </li>
</ul>
