@extends('../layouts.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        {{-- @dd($reservations) --}}
        <h1 class="p-relative">Users</h1>
        <div class="p-10">
            <x-regester :users="$users" />
        </div>
        {{-- <x-reservations :reservations='$reservations' /> --}}
    </div>
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
