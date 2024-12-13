@props(['book'])
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5 text-md-start text-center">
        <div class="row gx-4 gx-lg-5 align-items-center justify-content-lg-center justify-content-md-between g-4">
            <div class="col-md-5 d-flex justify-content-center"><img class="card-img-top mb-5 mb-md-0 w-75 " src="{{ asset($book->image) }}" alt="..." /></div>
            <div class="col-md-6 ">
                <h1 class="display-5 fw-bolder ">{{ $book->title }}</h1>
                <p class="lead my-4">{{ $book->description }}</p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <button id="reserve" class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="fa-solid fa-book-open"></i>
                        Reserver
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>