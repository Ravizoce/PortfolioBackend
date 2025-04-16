<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Admin Starter Template : Tailwind Toolbox</title>
    <meta name="author" content="name">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    @include('layouts.headerJsCss')


    @yield('style')
    @stack('styles')
</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal">
    {{-- toast --}}
    @include('toster')

    {{-- Nav --}}
    @include('layouts/nav')

    {{-- Side Nav --}}

    @include('layouts/sidenav')


    <div class="main-content pt-13 md:ml-44 flex-1 md:pt-5 pb-24 md:pb-5">
        
        @yield('contents')

    </div>

    {{-- footer section --}}
    @stack('scripts')
    <script src="{{ asset('plugin/tailwindModelJs/tailwindmodl.mini.js') }}"></script>

</body>

</html>
