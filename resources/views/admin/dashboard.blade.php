@extends('../layout.admin-layout')
@section('title', 'Dashboard')
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
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
