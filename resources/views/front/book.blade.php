@extends('../layout.layout')
@section('title', 'Search')
@section('links')
@vite(['resources/css/app.css', 'resources/js/app.js',"resources/js/components/scroll.js","resources/js/components/book.js"])
@endsection
@section('content')
    <x-navbar/>
    <x-book/>
    <x-books title="Related Books"/>
    <x-footer/>
@endsection