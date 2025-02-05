@props(['statistics'])

<div class="tickets p-20 bg-white rad-10">
    <h2 class="mt-0 mb-10">Books Statistics</h2>
    <p class="mt-0 mb-20 c-grey fs-15">Everything About Support Books</p>
    <div class="d-flex txt-c gap-5 f-wrap">
        <!-- Total Books -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-book fa-2x mb-10 c-orange"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['all'] }}</span>
            Total
        </div>

        <!-- Available Books -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-check fa-2x mb-10 c-green"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['available'] ?? 0 }}</span>
            Available
        </div>

        <!-- Pending Reservations -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-hourglass-half fa-2x mb-10 c-blue"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['pending'] }}</span>
            Pending
        </div>

        <!-- Reserved Books -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-bookmark fa-2x mb-10 c-purple"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['reserved'] }}</span>
            Reserved
        </div>

        <!-- Returned Books -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-undo fa-2x mb-10 c-teal"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['returned'] ?? 0 }}</span>
            Returned
        </div>

        <!-- Cancelled Reservations -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-times-circle fa-2x mb-10 c-red"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['cancelled'] }}</span>
            Cancelled
        </div>

        <!-- Expired Reservations -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-calendar-times fa-2x mb-10 c-red-orange"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['expired'] }}</span>
            Expired
        </div>

        <!-- Not Returned Books -->
        <div class="box p-20 rad-10 fs-13 c-grey">
            <i class="fa-solid fa-exclamation-circle fa-2x mb-10 c-yellow"></i>
            <span class="d-block c-black fw-bold fs-25 mb-5 count">{{ $statistics['not_returned'] }}</span>
            Unreturned
        </div>
    </div>
</div>
