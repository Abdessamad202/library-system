@extends('../layouts.admin-layout')
@section('title', 'Dashboard')
@section('links')
    @vite(['resources/js/components/scroll.js', 'resources/js/admin/dashboard.js', 'resources/js/admin/modal.js', 'resources/css/admin/modal.css', 'resources/js/admin/booksList.js'])
@endsection
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative" >Books</h1>
        <x-books-list :books='$books' :categories='$categories'/>
        <x-deleted-books :deletedBooks='$deletedBooks' />

        <!-- Display validation errors -->
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}"/>
    @endsession
    {{-- @dd($books,$deletedBooks) --}}
@endsection
