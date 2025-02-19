@vite(['resources/js/user/navbar.js', 'resources/css/user/navbar.css'])
@props(['categories'])
<div class="Nav-bar-a">
    <div class="Nav-wrap">
      <div class="logo"><span class="letter">A</span>IBRARY</div>
      <!-- Large Screen Nav -->
      <Nav class="large-screen">
        <ul class="Nav-menu">
          <li class="Nav-item"><a href="{{ route('home') }}" class="Nav-link">Home</a></li>
          @if (request()->routeIs('category'))
          <li class="Nav-item"><a href="#newBooksSlider" class="Nav-link">RelatedBooks</a></li>
          @elseif(request()->routeIs('home'))
          <li class="Nav-item"><a href="#newBooksSlider" class="Nav-link">NewBooks</a></li>
          <li class="Nav-item"><a href="#contact" class="Nav-link">Contact</a></li>
          @endif
          <li class="Nav-item">
            <div class="drop-down">
              <div class="title">Categories</div>
              <i class="fa-solid fa-caret-down"></i>
              <ul class="down-links">
                {{-- pluck ['name', 'id'] --}}
                @foreach ($categories as $id => $name)
                <li class="sub-Nav-item"><a href="{{ route('category', $id) }}" class="Nav-link sub">{{$name}}</a></li>
                @endforeach
              </ul>
            </div>
          </li>
          <li class="Nav-item profile-picture">
            <a href="{{ route('profile') }}">
              <div class="drop-element">
                <img src="{{ Storage::url(auth()->user()->image)}}" width="30" class="profile-picture rounded-circle" alt="profile">
              </div>
              
            </a>
          </li>
        </ul>
      </Nav>
      <Nav class="small-screen">
        <ul class="Nav-menu">
          <li class="Nav-item "><a href="#" class="Nav-link">Home</a></li>
          <li class="Nav-item">
            <div class="drop-down">
              <div class="drop-element">
                <div class="title">Categories</div>
                <i class="fa-solid fa-caret-down"></i>
              </div>
              <ul class="down-links-small">
                <li class="sub-Nav-item"><a href="#" class="Nav-link">About Us</a></li>
                <li class="sub-Nav-item"><a href="#" class="Nav-link">Our Team</a></li>
              </ul>
            </div>
          </li>
          <li class="Nav-item">
            <div class="drop-down">
              <div class="drop-element">
                <div class="title">Services</div>
                <i class="fa-solid fa-caret-down"></i>
              </div>
              <ul class="down-links-small">
                <li class="sub-Nav-item"><a href="#" class="Nav-link">Consulting</a></li>
                <li class="sub-Nav-item"><a href="#" class="Nav-link">Support</a></li>
              </ul>
            </div>
          </li>
          <li class="Nav-item"><a href="#newBooksSlider" class="Nav-link">Contact</a></li>
        </ul>
      </Nav>
      <!-- Small Screen Nav -->
      <div class="menu-icon d-flex gap-4 d-lg-none">
        <li class="Nav-item profile-picture">
          <a href="./profile.html">
            <div class="drop-element">
              <img src="{{ Storage::url(auth()->user()->image)}}" width="30" class="profile-picture" alt="profile">
            </div>
          </a>
        </li>
        <div>
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
</div>