@extends('../layout.admin-layout')
@section('title', 'Dashboard')
@section('content')
    <x-admin-sidebar />
    <div class="content w-full">
        <x-head />
        <h1 class="p-relative" >Books</h1>
        <x-books-list :books='$books' :categories='$categories'/>
        <x-deleted-books :deletedBooks='$deletedBooks' />

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    @session('success')
    <x-notification message="{{ session('success') }}"/>
    @endsession
    {{-- @dd($books,$deletedBooks) --}}
@endsection
