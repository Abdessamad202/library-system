@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/js/user/book.js', 'resources/css/user/book.css'])
@endsection
@section('content')
    <x-navbar />
    <x-book :book="$book" :userReservations="$userReservations" :likes="$likes" />
    @if($book->is_commentable)
        <x-comments :comments="$comments" :book="$book" />
    @endif
    <x-books-section title="Related Books" :books="$relatedBooks"  />
    <x-footer />
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
