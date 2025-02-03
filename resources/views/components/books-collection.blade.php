@props(['books'])
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