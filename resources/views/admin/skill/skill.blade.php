@extends('layouts.base')
@section('contents')
    {{-- Title --}}
    <x-PageTitle pageTitle="Skills (Tech Stack)" />

    <div class="pl-6 mt-2 pr-3 text-white">

        {{-- bread crums and add button --}}

        <div class="wrapper">
            <div class="flex justify-between pr-5 pl-2 py-3">
                <x-Breadcrumbs />
                {{-- <x-buttons.PrimaryLinkBtn addRoute="profile.create" /> --}}
                <button data-toggle="modal" data-target="#addmodal"
                    class="simplebutton inline-block rounded px-3 py-1 text-base uppercase cursor-pointer leading-normal shadow-blue-300 shadow-sm transition-all duration-150 ease-in-out hover:shadow-slate-600 text-white bg-blue-500">
                    Add
                </button>
                <x-Modal :footer=false class="!top-1/3 !-translate-y-1/3 !w-[60%]" id="addmodal"
                    modal_title="Add Skills">
                    <x-admin.skills.add-form route="skill.store" :types="$types" :groups="$groups"/>
                </x-Modal>
            </div>
        </div>
        {{-- Page TechStack --}}
        <div class="wrapper px-3">
            <x-Table 
                :values="$skills" 
                title="Skills"
                :view_more=false
                :routes="['edit' => 'skill.update', 'delete' => 'skill.delete']" 
                formcomponent='admin.skills.add-form' 
                :hidden_fields="['id','deleted_at', 'updated_at']"
                {{-- :fields_order="[]"  --}}
                />
        </div>

    </div>
@endsection
