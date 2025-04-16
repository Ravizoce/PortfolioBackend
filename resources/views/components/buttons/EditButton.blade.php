@props([
    'color' => null,
    'class' => '',
    'editRoute'=>null,
    'itemId',
    'lable'=> null,
    
])


<form method="POST" action="{{ $editRoute ? route($editRoute, $itemId ) : '#' }}"> 
    @csrf
    <button
        class="w-fit {{$lable != null ?? 'rounded px-3 py-1 text-base uppercase cursor-pointer leading-normal shadow-blue-300 shadow-sm transition-all duration-300 ease-in-out hover:shadow-slate-600 bg-blue-500' }} simplebutton inline-block  {{ $color ?? 'text-white' }}  {{ $class }}">
       {{$slot}}
        {{$lable}}
    </button>
</form>