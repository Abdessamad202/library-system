@extends('../layout.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative" >Books</h1>
        <x-books-list :books='$books'/>
        <x-deleted-books :deletedBooks='$deletedBooks' />
        @session('success')
        <x-notification message="{{ session('success') }}"/>
        @endsession
    </div>
    {{-- @dd($books,$deletedBooks) --}}
@endsection
