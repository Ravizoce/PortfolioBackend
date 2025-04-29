@props([
    'value' => null,
    'route' => '',
    'parameter' => null,
    'is_edit' => "0x00",
])
<div class="pl-6 pr-3">
    <form method="POST" enctype="multipart/form-data" action="{{ route($route, $parameter) }}">
        @csrf
        <x-inputs.Input name="full_name" type="text" label="Full Name" required="true" id='fullname' :oldvalue="$value?->full_name"  :is_edit="$is_edit" />
        <x-inputs.Input name="level" type="text" label="Level" required="true" :oldvalue="$value?->level"  :is_edit="$is_edit" />
        <x-inputs.Input name="greating" type="text" label="Greating" required="false" :oldvalue="$value?->greating"  :is_edit="$is_edit" />
        <x-inputs.Input name="tag_line" type="text" label="First tag line" required="false" :oldvalue="$value?->tag_line"  :is_edit="$is_edit" />
        <x-inputs.Input name="tag_line2" type="text" label="Second tag line" required="false" :oldvalue="$value?->tag_line2"  :is_edit="$is_edit" />
        
        {{-- @if (!$is_edit) --}}
        <x-inputs.Files name="image_url" type="file" label="Image" required="false" :oldvalue="$value?->urlImage" :is_edit="$is_edit" />

        {{-- @endif --}}
        <x-inputs.TextArea name="about" type="text" label="About" required="true" :oldvalue="$value?->About" :is_edit="$is_edit" />

        <div class="flex justify-start">
            <x-buttons.SubmitButton class="mx-4" lable="submit" />
            {{-- <x-buttons.BackButton class="mx-4" lable="back" backRoute="profile.index" /> --}}
        </div>
    </form>
</div>
