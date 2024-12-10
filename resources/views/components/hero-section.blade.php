@vite(['resources/js/components/swiper.js', 'resources/css/components/hero-section.css'])

<section class="hero-section">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class=" col-lg-6 text-center text-lg-start mt-5 mb-5 px mb-lg-0">
                <h1 class="display-4 fw-bold text-gray-800">
                    Discover the World of Books with
                    <span class="letter">A</span>IBRARY
                </h1>
                <p class="mt-3 text-muted fs-5">
                    Your gateway to knowledge, imagination, and inspiration. Explore a
                    curated collection of books tailored to spark your curiosity and
                    fuel your passion for reading.
                </p>
                <button class="explore mt-4"><a href="#explore" class=" fw-medium">
                        <span>Explore</span>
                    </a></button>
            </div>
            <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                <div class="swiper-container hero-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 1" class="w-50" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/psych-money-cover.jpg')}}"  alt="Book 2" class="w-50" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 3" class="w-50" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/psych-money-cover.jpg')}}" alt="Book 4" class="w-50" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
