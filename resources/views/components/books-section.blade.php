@props(['title', 'books'])
@vite(['resources/js/user/books.js', 'resources/css/user/books.css'])
<div id="newBooksSlider"></div>
<section class="py-5 mt-3 bg-light ">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-gray-800 fs-3">{{ $title }}</h2>
        <div class="books-slider">
            <div class="swiper-wrapper">
                @foreach ($books as $book)
                    <div class="swiper-slide">
                        <a href="{{ route('book', $book['id']) }}">
                            <img src="{{ asset($book['image']) }}" alt="Book {{ $book['id'] }}">
                            <h5>{{ $book['title'] }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>