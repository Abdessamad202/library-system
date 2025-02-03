@props(['category'])
<section class="hero" style="background: url('{{ asset('./assets/banner.jpg') }}') no-repeat center center/cover;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        <button onclick="location.href='#newBooksSlider'">Browse Categories</button>
    </div>
</section>