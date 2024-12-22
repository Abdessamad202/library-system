@props(['users'])
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Last Regestration</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>email</td>
                    <td>profile</td>
                    <td>Date Regestration</td>
                </tr>
            </thead>
            <!-- Fake Data -->
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img style="width: 50px;height: 50px;border-radius: 50%;" src="{{ Storage::url($user->image)}}" alt=""></td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tbody>
        </table>
    </div>
</div>
