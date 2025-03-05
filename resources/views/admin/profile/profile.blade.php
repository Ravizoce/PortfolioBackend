@extends('layouts.base')
@section('contents')
    {{-- Title --}}
    <x-PageTitle pageTitle="Profile" />

    <div class="pl-6 mt-2 pr-3 text-white">

        {{-- bread crums and add button --}}

        <div class="wrapper">
            <div class="flex justify-between pr-5 pl-2 py-3">
                <x-Breadcrumbs />
                <x-buttons.PrimaryLinkBtn addRoute="profile.create" />
            </div>
        </div>
        {{-- Page Table --}}
        <div class="wrapper px-3">
            <x-Table  :values="$profiles"/>
        </div>

    </div>
@endsection
