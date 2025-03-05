@props([
    'id' => 'toggler',
    'label' => null,
    'name' => 'toggler',
    'oldvalue' => null,
])
@php
    $id = $id ?? $name;
@endphp

<div class="ml-10 mb-3 relative cursor-pointer w-fit" id="toggleInputWrapper_{{ $id }}">
    @if ($label)
        <label for="{{$name}}">{{ $label }}</label>
    @endif
    <input type="checkbox" id="toggleinput_{{ $id }}" class="w-0 h-0 opacity-0 hidden" name="{{ $name }}"
        id="toggle" {{ $oldvalue ? 'checked' : '' }} />
    <div class="sliderwrapper_{{ $id }} bg-blue-400 w-13 h-6 rounded-xl flex items-center transition-all ease-in-out duration-150">
        <div class="slider_{{ $id }} bg-red-500 rounded-full w-6 h-6 transition-all ease-in-out duration-150"></div>
    </div>
</div>
@push('styles')
    <style>
        #toggleinput_{{ $id }}:checked+.sliderwrapper_{{ $id }}{
            background:blue;
        }
        #toggleinput_{{ $id }}:checked+.sliderwrapper_{{ $id }}>.slider_{{ $id }} {
            transform: translateX(26px);
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.getElementById('toggleInputWrapper_{{ $id }}').addEventListener('click', function() {
            let input = document.getElementById('toggleinput_{{ $id }}');
            input.checked = !input.checked;
        });
    </script>
@endpush
