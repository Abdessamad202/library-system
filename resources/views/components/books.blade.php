@props(['title'])

@vite(['resources/js/components/swiper.js', 'resources/css/components/books.css'])
<div id="newBooksSlider"></div>
<section class="py-5 mt-3 bg-light " >
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-gray-800 fs-3"  >{{ $title }}</h2>
        <div class="new-books-slider">
            <div class="swiper-wrapper">
                <!-- Book Item 1 -->
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1">
                    <h5>Book Title 1</h5>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1">
                    <h5>Book Title 1</h5>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1">
                    <h5>Book Title 1</h5>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1">
                    <h5>Book Title 1</h5>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1">
                    <h5>Book Title 1</h5>
                </div>
                <!-- Book Item 2 -->
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 2">
                    <h5>Book Title 2</h5>
                </div>
                <!-- Book Item 3 -->
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 3">
                    <h5>Book Title 3</h5>
                </div>
                <!-- Book Item 4 -->
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 4">
                    <h5>Book Title 4</h5>
                </div>
                <!-- Book Item 5 -->
                <div class="swiper-slide">
                    <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 5">
                    <h5>Book Title 5</h5>
                </div>
            </div>
            <!-- Pagination and Navigation -->
            <!-- <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        </div>
    </div>

    <button id="scrollToTop"
        style="opacity: 0; position: fixed; transition: all 0.5s; background-color: black;width: 50px; height: 50px; bottom: 20px; right: 20px; z-index: 1000;">
        <i class="fas fa-arrow-up" style="color: white;"></i>
    </button>
</section>
