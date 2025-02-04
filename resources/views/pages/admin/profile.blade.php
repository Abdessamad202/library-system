@extends('../layouts.admin-layout')
@section('title', 'Dashboard')
@section('links')
    @vite(['resources/js/components/scroll.js', 'resources/js/admin/modal.js', 'resources/css/admin/modal.css'])
@endsection
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        {{-- @dd($reservations) --}}
        <h1 class="p-relative">Profile</h1>
        <div class="p-10">
            <x-welcome />
        </div>

        {{-- <x-reservations :reservations='$reservations' /> --}}
    </div>
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
