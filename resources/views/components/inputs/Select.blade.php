@props([
    'name' => 'Select',
    'label' => 'Select',
    'article' => 'a',
    'required' => null,
    'options' => [],
    'option_name'=>'name',
    'addOpt' => 'false',
])

@php
    $id = $id ?? $name;
    $errorName = $label ?? $name;
@endphp
<div class="text-white px-3 mb-3">
    <label for="{{ $name }}" class='flex justify-start text-lg font-medium '>
        {{ $label }}{{ $required == 'true' ? '*' : '' }}
    </label>
    <div class="flex">
        <select name="{{ $name }}" id="{{ $id }}" {{ $required =="true" ? 'required' : '' }}
            class="text-white appearance-none  block min-w-9 w-full grow py-2 pr-3 pl-2 text-base  border-1 border-slate-500 placeholder:text-gray-400 {{ $addOpt == 'false' ? 'rounded' : 'rounded rounded-r-none' }} focus:bg-slate-900 focus:border-blue-500">
            <option value='' selected disabled hidden class="text-gray-400 bg-slate-700">Select {{ $article }}
                {{ $label }}</option>
            <option value="" disabled class="text-gray-400 bg-slate-700">Select {{ $article }}
                {{ $label }}
            </option>
            @foreach ($options as $option)
                <option value="{{ $option?->id }}">{{$option?->$option_name}}</option>
            @endforeach
        </select>
        @if ($addOpt == 'true')
            <button type="button"
                class="rounded-md rounded-l-none px-4 py-2 bg-cyan-400 text-3xl cursor-pointer select-none">+</button>
        @endif
    </div>
    @error($name)
        <div class="text-amber-500">
            {{ $message }}
        </div>
    @enderror
    <div class="hidden text-left text-amber-500 error_{{ $id }}">
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let element = document.getElementById("{{ $id }}");
            if (element) {
                element.onblur = function() {
                    let value = this.value.trim();

                    let errorElement = this.parentElement.parentElement.querySelector('.error_{{ $id }}');

                    if (this.hasAttribute('required') && (value == "")) {
                        // console.log(value, 'required empty');
                        errorElement.innerText = "Please select {{ $article }} {{ $errorName }}.";
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
