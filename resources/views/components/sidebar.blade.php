<div class="container-lg  h-100 position-relative rounded bg-light ">
    <div
        class="slider border-right h-100 d-flex justify-content-lg-center align-items-center bg-white position-fixed z-1 w-lg-250   start-0 top-0">
        <ul class="">
            <li class="active">
                <a class="d-flex align-center justify-center fs-14 c-black rad-6 px-lg-5" href="profile.html">
                    <i class="fa-regular fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-center fs-14 c-black rad-6 px-lg-5" href="settings.html">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-center fs-14 c-black rad-6 px-lg-5" href="reservation.html">
                    <i class="fa-brands fa-get-pocket"></i>
                    <span>reservation</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-center fs-14 c-black rad-6 px-lg-5" href="plans.html">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    {{$slot}}
</div>
