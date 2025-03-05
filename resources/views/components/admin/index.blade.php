@props([
    "pageTitle" =>"Page Title",
    "addRoute" =>"Add Route",

])
<x-PageTitle :pageTitle="$pageTitle" />

<div class="pl-6 mt-2 pr-3 text-white">
    {{-- bread crums and add button --}}
    <div class="wrapper">
        <div class="flex justify-between px-5 py-3">
            <x-breadcrumbs />
            <x-buttons.PrimaryLinkBtn :addRoute="$addRoute"/>
        </div>
    </div>
    <div class="table">
            tableHere
    </div>

</div>
