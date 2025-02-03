@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/components/scroll.js','resources/js/user/search.js', 'resources/css/user/search.css'])
@endsection
@section('content')
    <x-navbar />
    <h1 class="text-3xl font-bold text-center">Welcome to Book Page</h1>
    <x-search-bar />
    <x-books-collection :books='$books' />
    <x-footer />
@endsection