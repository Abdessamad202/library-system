@extends('../layout.layout')
@section('title', 'Home')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js'])
@endsection
@section('content')
    <x-navbar/>
    <x-heroSection />
    <x-books-section title="New Books" :books="$books" />
    <x-location />
    <x-footer />
    @session('success')
    <x-notification message="{{ session('success') }}"/>
    @endsession
@endsection
