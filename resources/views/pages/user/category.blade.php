@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/user/category.css'])
@endsection
@section('content')
    <x-navbar />
    <x-c-hero-section :category="$category" />
    <x-books-section title="Related Books" :books="$booksRelated" />
    <x-footer />
@endsection
