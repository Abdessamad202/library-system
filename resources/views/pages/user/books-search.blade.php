@extends('../layout.layout')
@section('title', 'Search')
@section('links')
<style>
    .h-24_5-vh {
        height: 24.5vh;
        text-align: center;
    }
    .ops{
        font-size: 40px;
        font-weight: bold;
    }
    .hide{
        display: none;
    }
</style>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/components/scroll.js', 'resources/css/components/search.css'])
@endsection
@section('content')
    <x-navbar />
    <h1 class="text-3xl font-bold text-center">Welcome to Book Page</h1>
    <section class="py-3 bg-light ">
        <form class="max-w-md mx-auto">
            <div class="relative mb-4 flex  ">
                <!-- Icon -->
                <div class="absolute   inset-y-0 right-10 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 glasses" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <!-- Search Input -->
                <input type="search" id="default-search"
                    class="block w-full py-4 px-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for books ..." required />
                <!-- Submit Button -->
            </div>
        </form>

    </section>
    <section class="container justify-content-center mb-5 mx-auto px-4">
        <div class="books grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 justify-items-center">
            @foreach ($books as $book)
                <div class="bg-white shadow-md rounded-lg p-6 books-item">
                    <a href="{{ route('book', $book->id) }}">
                        <img src="{{ asset($book->image) }}" alt="Profile Picture" class="mb-4">
                        <h2 class="text-lg font-bold mb-2 book-title">{{ $book->title }}</h2>
                        <p class="text-gray-700 text-base">
                            {{ $book->description }}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- NOT FOUND  --}}
        {{-- @if ($books->isEmpty()) --}}
            <div class="not-found h-24_5-vh hide">
                <div class="ops">Opss...</div>
                <h3>No books found matching your search.</h3>
            </div>
        {{-- @endif --}}
    </section>
    <x-footer />
@endsection
@section('scripts')
<script>
    let booksItems = document.querySelectorAll('.books-item');
    let booksArray = [...booksItems];
    const bookContainer = document.querySelector('.books');
    const inputField = document.querySelector('#default-search');
    inputField.oninput = (e) => {
        e.target.value != '' ? document.querySelector('.glasses').classList.add('hide') : document.querySelector('.glasses').classList.remove('hide');
        bookContainer.innerHTML = '';
        let booksSearched = booksArray.filter((book) => {
            return book.querySelector('.book-title').textContent
                .toLowerCase()
                .startsWith(e.target.value.toLowerCase());
        });
        if (booksSearched.length == 0) {
            document.querySelector('.not-found').classList.remove('hide');

        }else{
            document.querySelector('.not-found').classList.add('hide');
            booksSearched.forEach((book) => {
                bookContainer.appendChild(book);
            })
        }
    }
</script>
@endsection