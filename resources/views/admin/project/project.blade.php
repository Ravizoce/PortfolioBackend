@extends('layouts.base')
@section('contents')
    {{-- Title --}}
    <x-PageTitle pageTitle="project" />

    <div class="pl-6 mt-2 pr-3 text-white">

        {{-- bread crums and add button --}}

        <div class="wrapper">
            <div class="flex justify-between pr-5 pl-2 py-3">
                <x-Breadcrumbs />
                <button data-toggle="modal" data-target="#addmodal"
                    class="simplebutton inline-block rounded px-3 py-1 text-base uppercase cursor-pointer leading-normal shadow-blue-300 shadow-sm transition-all duration-150 ease-in-out hover:shadow-slate-600 text-white bg-blue-500">
                    Add
                </button>
                <x-Modal :footer=false class="!top-1/3 !-translate-y-1/3 !w-[60%]" id="addmodal" modal_title="Add project">
                    <x-admin.project.add-form route="project.store" />
                </x-Modal>
            </div>
        </div>
        {{-- Page Table --}}
        <div class="wrapper px-3">
             <x-Table title="project" :values="$projects" :routes="['edit' => 'project.update', 'delete' => 'project.delete']" 
                {{-- formcomponent='admin.project.add-form' --}}
                :fields_order="['full_name', 'greating']" :hidden_fields="['id', 'deleted_at', 'updated_at']" :fileField="['image_url']" />
        </div>

    </div>
@endsection
