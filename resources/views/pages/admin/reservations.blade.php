@extends('../layouts.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        {{-- @dd($reservations) --}}
        <h1 class="p-relative" >Reservations</h1>
        <x-reservations :reservations='$reservations' />
        <x-returned :reservations='$returned' />
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}"/>
    @endsession
@endsection
