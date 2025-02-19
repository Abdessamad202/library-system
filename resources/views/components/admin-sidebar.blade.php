<div class="sidebar bg-white p-20 p-fixed h-100-vh z-index-10">
    <h3 class="p-relative txt-c mt-0">
        <span class='c-red'>A</span>
        <span class="md s-text">IBRARY</span>
        <span class="sm"><i class="fa-solid fa-book-open"></i></span>
    </h3>
    <ul>
        <li>
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.dashboard') }}">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.settings') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.settings') }}">
                <i class="fa-solid fa-gear fa-fw"></i>
                <span>Settings</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.profile') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.profile') }}">
                <i class="fa-regular fa-user fa-fw"></i>
                <span>Profile</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.users') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route(name: 'admin.users') }}">
                <i class="fa-solid fa-users fa-fw"></i>
                <span>Users</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.categories') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.categories') }}">
                <i class="fa-solid fa-diagram-project fa-fw"></i>
                <span>Categories</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.books') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.books') }}">
                <i class="fa-solid fa-diagram-project fa-fw"></i>
                <span>Books</span>
            </a>
        </li>
        <li>
            <a class="{{ request()->routeIs('admin.reservations') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
                href="{{ route('admin.reservations') }}">
                <i class="fa-solid fa-graduation-cap fa-fw"></i>
                <span>Reservations</span>
            </a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="d-flex align-center fs-14 c-black rad-6 p-10 logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="md">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>
