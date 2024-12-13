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
          <h1>{{ $category->name }}</h1>
          <p>{{ $category->description }}</p>
          <button onclick="location.href='#newBooksSlider'">Browse Categories</button>
        </div>
      </section>
    <x-books title="Categories Books"/>
    <x-footer/>
@endsection