<div class="  card shadow-sm w-100 h-100">
    <div class="card-header bg-primary text-white">
        <h2 class="h2">Recent Reservations</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Cover</th>
                        <th>Reservation Date</th>
                        <th>Time Up</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($reservations as $reservation) --}}

                        <tr>
                            <td>The Psychology of Money</td>
                            <td>Morgan Housel</td>
                            <td class="text-center">
                                <img src="psych-money-cover.jpg" alt="The Psychology of Money" class=""
                                    style="max-width: 50px;" />
                            </td>
                            <td>10 Dec 2024</td>
                            <td>10 Dec 2024</td>
                            <td>
                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                    @php
                        var_dump($reservations);
                    @endphp
                    <tr>
                        <td>Atomic Habits</td>
                        <td>James Clear</td>
                        <td>
                            <img src="psych-money-cover.jpg" alt="The Psychology of Money" class=""
                                style="max-width: 50px;" />
                        </td>
                        <td>15 Dec 2024</td>
                        <td>15 Dec 2024</td>
                        <td>
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Deep Work</td>
                        <td>Cal Newport</td>
                        <td>
                            <img src="psych-money-cover.jpg" alt="The Psychology of Money" class=""
                                style="max-width: 50px;" />
                        </td>
                        <td>20 Dec 2024</td>
                        <td>20 Dec 2024</td>
                        <td>
                            <!-- remove icon in button -->
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
