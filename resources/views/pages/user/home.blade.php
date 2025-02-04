@extends('../layouts.user-layout')
@section('title', 'Home')
@section('content')
    <x-navbar />
    <x-heroSection />
    <x-books-section title="New Books" :books="$books" />
    <x-location />
    <x-footer />
    @session('success')
        <x-notification message="{{ session('success') }}" />
    @endsession
@endsection
