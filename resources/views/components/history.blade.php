@props(['history'])
<div class="card shadow-sm mt-5 w-100  h-100">
    <div class="card-header bg-primary text-white">
        <h2 class="h2">Reservations History</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($history->isEmpty())
                <p class="text-center mt-2">No reservations found.</p>
            @else
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Cover</th>
                        <th>Reservation Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $reservation)
                        <tr>
                            <td>{{$reservation->book->title}}</td>
                            <td>{{$reservation->book->author}}</td>
                            <td class="d-flex justify-content-center">
                                <img src="{{asset($reservation->book->image)}}" alt="The Psychology of Money" class=""
                                    style="width: 50px;" />
                            </td>
                            <td>{{$reservation->date_emprunt}} {{$reservation->hour_emprunt}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
