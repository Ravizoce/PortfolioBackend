@props([
    'pageTitle' => 'Page Title',
    'addRoute' => '#',
    'class' => null,
])

<div class="bg-gray-800 mt-7 w-full">
    <div
        class="bg-gradient-to-l from-blue-900 to-gray-800 p-4 shadow text-2xl text-white flex justify-between {{ $class }}">
        <h3 class="first-letter:uppercase font-bold pl-2">{{ $pageTitle }}</h3>
    </div>
</div>
