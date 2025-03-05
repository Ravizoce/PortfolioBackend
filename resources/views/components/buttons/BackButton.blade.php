@props([
    'color' => null,
    'lable' =>"Back Button",
    'backRoute'=>null
    
])

<x-buttons.PrimaryLinkBtn  :addRoute="$backRoute"  :lable="$lable"  class="!bg-red-500"/>