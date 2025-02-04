<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js'])
    @yield("links")
</head>
<body>
    @yield('content')
    <button id="scrollToTop"
        style="opacity: 0; position: fixed; transition: all 0.5s; background-color: black;width: 50px; height: 50px; bottom: 20px; right: 20px; z-index: 1000;">
        <i class="fas fa-arrow-up" style="color: white;"></i>
    </button>
</body>
@yield("scripts")
</html>