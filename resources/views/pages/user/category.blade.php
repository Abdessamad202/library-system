@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js', 'resources/css/user/category.css'])
@endsection
@section('content')
    <x-navbar />
    <x-c-hero-section :category="$category"/>
    <x-books-section title="Related Books" :books="$booksRelated" />
    <x-footer />
@endsection
