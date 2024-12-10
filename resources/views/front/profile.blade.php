@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js', 'resources/css/components/profile.css'])
@endsection
@section('content')
    <x-navbar />
    <x-sidebar>
        <div class=" row  w-100 padding-100   mt-5 mb-5 ">
            <div class=" px-4 h-100-vh d-flex justify-content-center align-items-center flex-column">
                <!-- <h1 class="h2">Change Password</h1> -->
                <div class="mt-5 card shadow-sm w-100 h-100">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h2">Profile Information</h2>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-evenly">
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Full Name</div>
                            <div class="col-sm-9">John Doe</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Email</div>
                            <div class="col-sm-9">johndoe@example.com</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Phone</div>
                            <div class="col-sm-9">+1 234 567 890</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Address</div>
                            <div class="col-sm-9">123 Main Street, Cityville, Country</div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-secondary">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </x-sidebar >
    <x-footer />
@endsection
