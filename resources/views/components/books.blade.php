@props(['title'])

@vite(['resources/js/components/swiper.js', 'resources/css/components/books.css'])
<div id="newBooksSlider"></div>
<section class="py-5 mt-3 bg-light ">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-gray-800 fs-3">{{ $title }}</h2>
        <div class="new-books-slider">
            <div class="swiper-wrapper">
                <!-- Book Item 1 -->
                @foreach ($books as $book)
                    <div class="swiper-slide">
                        <a href="{{ route('book', $book->id) }}">
                            <img src="{{ asset($book->image) }}" alt="Book {{$book->id}}">
                            <h5>{{ $book->title }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Pagination and Navigation -->
            <!-- <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        </div>
    </div>

    
</section>
