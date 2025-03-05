@props([
    'color' => null,
    'class' => '',
    'addRoute',
    'itemId',
    'httpMethod'=>"GET",
    "lable"=>"Add",
    
    
])
    <a href="{{ $addRoute ? route($addRoute) : '#' }}"
        class="simplebutton inline-block rounded px-3 py-1 text-base uppercase cursor-pointer leading-normal shadow-blue-300 shadow-sm transition-all duration-150 ease-in-out hover:shadow-slate-600 {{ $color ?? 'text-white' }} bg-blue-500 {{ $class }}">
        {{$lable}}
    </a>
