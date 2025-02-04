@extends('../layouts.admin-layout')
@section('title', 'Dashboard')
@section('links')
    @vite(['resources/js/components/scroll.js', 'resources/js/admin/dashboard.js', 'resources/js/admin/modal.js', 'resources/css/admin/modal.css'])
@endsection
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative">Dashboard</h1>
        <x-wrapper>
            <x-welcome />
            <x-books-info :statistics='$booksStatistics' />
        </x-wrapper>
        <x-regester :users='$newUsers' />
        <x-reservations :reservations='$todayReservations' />
        <x-returned :reservations='$todayReturns' />
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
{{-- @dd($todayReturns) --}}