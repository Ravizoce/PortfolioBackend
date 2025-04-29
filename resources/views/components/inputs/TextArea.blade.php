@props([
    'name' => 'Input',
    'label' => 'Name',
    'placeholder',
    'id',
    'type' => 'text',
    'oldvalue' => null,
    'required' => false,
    'labelClass' => '',
    'is_edit' =>"0x00",
])
@php
    $id = ($id ?? $name).$is_edit;
    $errorName = $label ?? $name;
@endphp
<div class="w-full px-3 mb-3 text-white">
    <label for="{{ $name }}" class='flex justify-start text-lg font-medium {{$labelClass}}'>
        {{ $label }} {{ $required == "true" ? '*' : '' }} 
    </label>
    <div class="mt-1 w-full">
        <textarea
            {{ $attributes->merge([
                'type' => $type,
                'name' => $name,
                'placeholder' => $placeholder ?? $label ?? $name,
                'value' => old($name, $oldvalue),
                'class' =>
                    'text-white block min-w-9 w-full grow py-2 pr-3 pl-2 text-base text-gray-900 border-1 border-slate-500 placeholder:text-gray-400 rounded focus:bg-slate-900 focus:border-blue-500',
                'rows'=>'4',
                'id' => $id,
            ]) }}
            {{ $required == "true" ? 'required' :''}}>{{old($name,$oldvalue)}}</textarea>
        @error($name)
            <div class="text-left text-amber-500">
                {{ $message }}
            </div>
        @enderror
        <div class="text-left hidden text-amber-500 error_{{$id}}">
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let element = document.getElementById("{{ $id }}");
            if (element) {
                element.onblur = function() {
                    let value = this.value.trim();
                    let errorElement = this.parentElement.querySelector('.error_{{$id}}');
                    
                    if (this.hasAttribute('required') && (value == "")) {
                        errorElement.innerText ="{{ $errorName }} can't be empty.";
                        errorElement.classList.remove('hidden');

                    } else {
                        errorElement.classList.add('hidden');
                        errorElement.innerText = "";
                    }
                }
            }
        });
    </script>
@endpush

