@extends('../layout.layout')
@section('title', 'Home')
@section('links')
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js'])
@endsection
@section('content')
    <x-navbar/>
    <x-heroSection />
    <x-books title="New Books" />
    <x-location />
    <x-footer />
@endsection
