@props(['book'])
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5 text-md-start text-center">
        <div class="row gx-4 gx-lg-5 align-items-center justify-content-lg-center justify-content-md-between g-4">
            <div class="col-md-5 d-flex justify-content-center"><img class="card-img-top mb-5 mb-md-0 w-75 "
                    src="{{ asset($book->image) }}" alt="..." /></div>
            <div class="col-md-6 ">
                <h1 class="display-5 fw-bolder ">{{ $book->title }}</h1>
                <p class="lead my-4">{{ $book->description }}</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    @if (!$book->search)
                        <form action="" method="post">
                            <button id="reserve" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="fa-solid fa-book-open"></i>
                                Reserver
                            </button>
                        </form>
                    @else
                        <a id="reserve"
                            class="btn btn-success flex-shrink-0" type="button">
                            <i class="fa-solid fa-check"></i>
                            Reserved Successfully
                      </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Date:</label>
                        <input type="date" id="date_emprunt" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Select Time:</label>
                        <select class="form-select" aria-label="Default select example" name="timeEmprunt"
                            id="hour_emprunt" style="height: 150px, overflow-y: scroll">
                            <option selected value="">Select Time</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="confirmReservation" data-book-id="{{ $book->id }}"
                    data-token="{{ csrf_token() }}" class="btn btn-primary">Confirm Reservation</button>
            </div>
        </div>
    </div>
</div>
