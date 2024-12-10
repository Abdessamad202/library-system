@extends('../layout.layout')
@section('title', 'Home')
@section('links')
@vite(['resources/css/app.css', 'resources/js/app.js',"resources/js/components/scroll.js"])
@endsection
@section('content')
    <x-navbar/>
    <x-hero-section/>
    <x-books title="New Books"/>
    <x-location />
    <x-footer/>
@endsection
