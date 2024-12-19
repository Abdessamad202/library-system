@props(['title'])
<div class="content w-full">
    <x-head/>
    <h1 class="p-relative">{{$title}}</h1>
    <x-wrapper>
        <x-welcome/>
        <x-books-info/>
    </x-wrapper>
    <x-regester />
    <x-reservations />
</div>