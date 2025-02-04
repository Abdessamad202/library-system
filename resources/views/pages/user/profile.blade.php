@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/user/profile.css', 'resources/js/user/profile.js'])
@endsection
@section('content')
    <x-navbar />
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
    <x-sidebar>
        <div class=" row  w-100 padding-100   mt-5 mb-5 ">
            <div class=" px-4 h-100-vh d-flex justify-content-center align-items-center flex-column">
                <x-profile />
            </div>
        </div>
    </x-sidebar>
    <x-footer />
@endsection
