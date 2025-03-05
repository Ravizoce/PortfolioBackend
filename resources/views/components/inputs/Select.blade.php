@props([
    'name' => 'Select',
    'label' => 'Select',
    'article' => 'a',
    'required' => null,
])

@php
    $id = $id ?? $name;
@endphp
<div class="text-white px-3 mb-3">
    <label for="{{ $name }}" class='block text-lg font-medium '>
        {{ $label }}
    </label>
    <select name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}
        class="text-white appearance-none  block min-w-9 w-full grow py-2 pr-3 pl-2 text-base  border-1 border-slate-500 placeholder:text-gray-400 rounded focus:bg-slate-900 focus:border-blue-500">
        <option value='' selected disabled hidden class="text-gray-400 bg-slate-700">Select {{ $article }}
            {{ $name }}</option>
        <option value="" disabled class="text-gray-400 bg-slate-700">Select {{ $article }} {{ $name }}
        </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    @error($name)
        <div class="text-red-600">
            {{ $message }}
        </div>
    @enderror
    <div class="hidden text-red-500 error_{{ $id }}">
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let element = document.getElementById("{{ $id }}");
            if (element) {
                element.onblur = function() {
                    let value = this.value.trim();
                    
                    let errorElement = this.parentElement.querySelector('.error_{{ $id }}');

                    if (this.hasAttribute('required') && (value == "")) {
                        // console.log(value, 'required empty');
                        errorElement.innerText = "Please select {{$article}} {{ $name }}.";
                        errorElement.classList.remove('hidden');

                    } else {
                        // console.log('no error')
                        errorElement.classList.add('hidden');
                        errorElement.innerText = ""; 
                    }
                }
            }
        });
    </script>
@endpush
