@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/js/user/book.js'])
@endsection
@section('content')
    <x-navbar />
    <x-book :book="$book" :userReservations="$userReservations" />
    <x-books-section title="Related Books" :books="$relatedBooks"  />
    <x-footer />
@endsection
