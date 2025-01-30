@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js', 'resources/css/components/profile.css'])
@endsection
@section('content')
    <x-navbar />
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
    <x-sidebar>
        <div class=" row  w-100 padding-100   mt-5 mb-5 ">
            <div class=" px-4 h-100-vh d-flex justify-content-center align-items-center flex-column">
                <!-- <h1 class="h2">Change Password</h1> -->
                <x-profile />
            </div>
        </div>
    </x-sidebar>
    <x-footer />
@endsection
