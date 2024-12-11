<div class="container-lg  h-100 position-relative rounded bg-light ">
    <div
        class="slider border-right h-100 d-flex justify-content-lg-center align-items-center bg-white position-fixed z-1 w-lg-250   start-0 top-0">
        <ul class="">
            <li class="{{ request()->routeIs('profile') ? 'active' : ''}}">
                <a class="d-flex align-center justify-center fs-14 c-black rad-6 px-lg-5" href="{{route('profile')}}">
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('settings') ? 'active' : ''}}">
                <a class="d-flex align-center fs-14 c-black rad-6 px-lg-5 " href="{{route('settings')}}">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('reservation') ? 'active' : ''}}">
                <a class="d-flex align-center fs-14 c-black rad-6 px-lg-5" href="{{route('reservation')}}">
                    <i class="fa-brands fa-get-pocket"></i>
                    <span>reservation</span>
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="d-flex w-100 align-center gap-2 fs-14 c-black rad-6 px-lg-5" >
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    {{$slot}}
</div>
