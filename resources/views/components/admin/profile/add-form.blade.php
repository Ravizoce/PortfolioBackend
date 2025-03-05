@extends('layouts.base')
@section('contents')
    <div class="pl-6 pr-3">
        <x-PageTitle pageTitle="New Profile" />
        <div class="wrapper m-4">
            <x-breadcrumbs />
        </div>

        <x-card>
            <form method="post" action="{{route("profile.store")}}" >
                @csrf
                <x-inputs.Input name="name" type="text" label="Full Name" required="true" id='fullname' />
                <x-inputs.Input name="level" type="text" label="Level" required="true" />
                <x-inputs.Input name="tag_line" type="text" label="First tag line" required="false" />
                <x-inputs.Input name="tag_line2" type="text" label="Second tag line" required="false" />
                <x-inputs.Files name="image_urlrl" type="file" label="Image" required="false" />
                <x-inputs.TextArea name="about" type="text" label="About" required="true" />
                <x-buttons.SubmitButton class="mx-4" lable="submit" />
                <x-buttons.BackButton class="mx-4" lable="back" backRoute="profile.index" />
            </form>
        </x-card>
    </div>
@endsection