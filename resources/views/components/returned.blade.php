@props(['reservations'])
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">
        @if(request()->is('admin/dashboard'))
            Today's Returned Books
        @else
            Returned Books
        @endif
    </h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>User</td>
                    <td>Book</td>
                    <td>Cover</td>
                    @if (!request()->is('admin/dashboard'))
                        <td>Returned Date </td>
                    @endif
                    <td>Returned Hour </td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @if (count($reservations) == 0)
                    <tr>
                        <td colspan="5" class="text-center">No Reservations for Today</td>
                    </tr>
                @else
                    @foreach ($reservations as $reservation )
                    <tr>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->book->title }}</td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset($reservation->book->image) }}" alt="The Prevention of Money" class=""
                                style="width: 50px; height: 100%;border-radius: 0;" />
                        </td>
                        @if (!request()->is('admin/dashboard'))
                            <td>{{ $reservation->date_retour }}</td>
                        @endif
                        <td>{{ $reservation->hour_retour }}</td>
                        {{-- giving --}}
                        <td>
                            <div class="">
                                <form action="{{ route('returned', $reservation->id) }}" method="post">
                                    @csrf
                                    <button class="label btn-shape bg-green c-white btn "><i class="fas fa-gift"></i> Returned</button>
                                </form>
                            </div>
                        </td>
                        {{-- <td>{{ $reservation->date_retour }}</td> --}}
                    </tr>
                    @endforeach
                @endif
                {{-- @dd($reservations) --}}
            </tbody>
        </table>
    </div>
</div>
