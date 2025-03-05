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

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("style")

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

    @stack('styles')
</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal">
    {{-- toast --}}
    @include("toster")

    {{-- Nav --}}
    @include("layouts/nav")

    {{-- Side Nav --}}

    @include("layouts/sidenav")


    <div class="main-content pt-13 md:ml-44 flex-1 md:pt-5 pb-24 md:pb-5">

        @yield("contents")
        
    </div>

    {{-- footer section --}}
    @stack('scripts')

</body>

</html>