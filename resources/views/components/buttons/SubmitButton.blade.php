@props([
    'color' => null,
    'class' => '',
    'addRoute'=>null,
    'itemId',
    'lable' =>"Primary Button"
    
])

<button type="submit"
        class="simplebutton inline-block rounded px-3 py-1 text-base uppercase cursor-pointer leading-normal shadow-blue-300 shadow-sm transition-all duration-150 ease-in-out hover:shadow-slate-600 {{ $color ?? 'text-white' }} bg-green-500 {{ $class }}">{{$lable}}</button>