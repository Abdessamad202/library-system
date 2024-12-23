@extends('../layout.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative" >Categories</h1>
        <x-categories-list :categories='$categories' />
        {{-- <x-books-list :books='$books'/>
        <x-deleted-books :deletedBooks='$deletedBooks' /> --}}
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}"/>
    @endsession
    {{-- @dd($books,$deletedBooks) --}}
@endsection
