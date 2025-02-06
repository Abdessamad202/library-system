@props(['book', 'userReservations', 'likes'])
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5 text-md-start text-center">
        <div class="row gx-4 gx-lg-5 align-items-center justify-content-lg-center justify-content-md-between g-4">
            <div class="col-md-5 d-flex justify-content-center book-cover">
                <button class='like-btn {{ $likes['is_liked'] ? 'liked' : '' }}'
                    title="{{ $likes['is_liked'] ? 'Unlike' : 'Like' }}" data-book-id="{{ $book->id }}">
                    <i class="fa-solid fa-heart "></i>
                    <span class="like-count">{{ $likes['count'] }}</span>
                </button>
                <img class="card-img-top mb-5 mb-md-0 w-75" src="{{ asset($book->image) }}" alt="{{ $book->title }}" />
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $book->title }}</h1>
                <p class="lead my-4">{{ $book->description }}</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    @if ($book->reserved)
                        <div class="alert alert-success text-center w-100" role="alert">
                            <h4 class="alert-heading fw-bold">Reserved Successfully</h4>
                            <p class="mb-0">You have successfully reserved this book. You can now check your
                                reservations in the "My Reservations" section.</p>
                            <a id="comment" href="{{ route('reservation') }}" class="btn btn-primary mt-1"
                                type="button">
                                <i class="fa-solid fa-circle-plus"></i>
                                Check Reservations
                            </a>
                        </div>
                    @else
                        @if ($book->reserved_number === $book->stock)
                            <div class="alert alert-danger text-center w-100" role="alert">
                                <h4 class="alert-heading fw-bold">Book Unavailable</h4>
                                <p class="mb-0">Unfortunately, this book is currently out of stock. Please check back
                                    later or explore other titles.</p>
                            </div>
                        @else
                            @if ($userReservations >= 3)
                                <div class="alert alert-warning text-center w-100" role="alert">
                                    <h4 class="alert-heading fw-bold">Reservation Limit Reached</h4>
                                    <p class="mb-0">You have already reserved the maximum number of books allowed.
                                        Complete an existing reservation to reserve more.</p>
                                </div>
                            @else
                                <form action="" method="post">
                                    <button id="reserve" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="fa-solid fa-book-open"></i>
                                        Reserver
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<x-book-modal :id="$book->id" />
