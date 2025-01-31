@extends('../layout.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        {{-- @dd($reservations) --}}
        <h1 class="p-relative">Profile</h1>
        <div class="p-10">
            <x-change-email />
            <x-email-confirmation />
            <x-pass-changing />
            @if(auth()->user()->isAdmin)
                <x-role-switcher />
            @endif
        </div>
        {{-- <x-reservations :reservations='$reservations' /> --}}
    </div>
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
