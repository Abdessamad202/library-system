@extends('../layout.layout')
@section('title', 'Search')
@section('links')
@vite(['resources/css/app.css', 'resources/js/app.js',"resources/js/components/scroll.js","resources/css/components/category.css"])
@endsection
@section('content')
    <x-navbar/>
    <section class="hero" style="background: url('{{ asset("./assets/banner.jpg") }}') no-repeat center center/cover;">
        <div class="hero-overlay"></div>
        <div class="hero-content">
          <h1>Explore Collection</h1>
          <p>Discover a wide range of books across different categories and genres.</p>
          <button onclick="location.href='#categories'">Browse Categories</button>
        </div>
      </section>
    <x-books title="New Books"/>
    <x-footer/>
@endsection