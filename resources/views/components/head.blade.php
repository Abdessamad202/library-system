<!-- Start Head -->
<div class="head bg-white p-15 between-flex">

  <i class="fa-solid fa-bars "></i>
    <div class="search p-relative d-flex align-center">
      {{-- menu --}}
      <div class="toggle-menu p-relative">
      </div>
      <input class="p-10" type="search" placeholder="Type A Keyword" />
    </div>
    <div class="icons d-flex align-center">
      <span class="notification p-relative">
        <i class="fa-regular fa-bell fa-lg"></i>
      </span>
      <img src="{{Storage::url(auth()->user()->image)}}"  alt="" />
    </div>
  </div>
<!-- End Head -->