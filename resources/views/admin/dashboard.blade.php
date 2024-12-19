@extends('../layout.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative">Dashboard</h1>
        <x-wrapper>
            <x-welcome />
            <x-books-info />
        </x-wrapper>
        <x-regester />
        <x-reservations />
    </div>
@endsection
