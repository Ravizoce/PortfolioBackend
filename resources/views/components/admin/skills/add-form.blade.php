@props([
    'value' => null,
    'route' => '',
    'parameter' => null,
    'is_edit' => false,
])
<div class="pl-6 pr-3">
    <form method="POST" enctype="multipart/form-data" action="{{ route($route, $parameter) }}">
        @csrf
        <x-inputs.Input name="full_name" type="text" label="Full Name" required="true" id='fullname' :oldvalue="$value?->full_name" />
        <x-inputs.Input name="level" type="text" label="Level" required="true" :oldvalue="$value?->level" />
        <x-inputs.Input name="greating" type="text" label="Greating" required="false" :oldvalue="$value?->greating" />
        <x-inputs.Input name="tag_line" type="text" label="First tag line" required="false" :oldvalue="$value?->tag_line" />
        <x-inputs.Input name="tag_line2" type="text" label="Second tag line" required="false" :oldvalue="$value?->tag_line2" />
        
        @if (!$is_edit)
        <x-inputs.Files name="image_url" type="file" label="Image" required="false" :oldvalue="$value?->image_url" />
        @endif
        <x-inputs.TextArea name="about" type="text" label="About" required="true" :oldvalue="$value?->About" />

        <div class="flex justify-start">
            <x-buttons.SubmitButton class="mx-4" lable="submit" />
        </div>
    </form>
</div>
