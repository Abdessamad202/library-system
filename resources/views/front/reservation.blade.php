@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js', 'resources/css/components/profile.css'])
@endsection
@section('content')
    <x-navbar />
    <x-sidebar>
        <div class="row  w-100 padding-100   mt-5 mb-5 ">
            <div class="py-5 px-4 d-flex justify-content-center align-items-center flex-column">
                <!-- <h1 class="h2">Change Password</h1> -->
                <x-recent :recent="$recent" />
                <x-history :history="$history"/>
            </div>
        </div>
    </x-sidebar>
    <x-footer />
    @session('success')
    <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
