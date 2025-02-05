@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/user/profile.css'])
@endsection
@section('content')
    <x-navbar />
    <x-sidebar>
        <div class="row  w-100 padding-100   mt-5 mb-5 ">
            <div class="py-5 px-4 d-flex justify-content-center align-items-center flex-column">
                <!-- <h1 class="h2">Change Password</h1> -->
                <x-recent :recent="$recent" title="Recent Reservations" />
                <x-recent :recent="$reserved" title="Reserved Books" />
                <x-history :history="$history" />
            </div>
        </div>
    </x-sidebar>
    <x-footer />
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
