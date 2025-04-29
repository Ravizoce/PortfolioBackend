@props([
    'name' => 'Input',
    'label' => 'Name',
    'placeholder',
    'id',
    'oldvalue' => null,
    'multiple' => false,
    'required' => false,
    'labelClass' => '',
    "is_edit"=> "0x00",
])
@php
    $id = ($id ?? $name).$is_edit;
    $errorName = $label ?? $name;
@endphp

<div class="w-full px-3 mb-3 text-white">
    <label for="{{ $name }}" class='flex justify-start text-lg font-medium {{ $labelClass }}'>
        {{ $label }} {{ $required == 'true' ? '*' : '' }}
    </label>
    <div class="mt-1 w-full">
        <input type="file"
            {{ $attributes->merge([
                'name' => $name,
                'placeholder' => $placeholder ?? ($label ?? $name),
                'value' => old($name, $oldvalue),
                'class' =>
                    'text-white block min-w-9 w-full grow py-2 pr-3 pl-2 text-base text-gray-900 border-1 border-slate-500 placeholder:text-gray-400 rounded focus:bg-slate-900 focus:border-blue-500 cursor-pointer',
                'id' => $id,
                'accept' => 'image/png, image/gif, image/jpeg',
            ]) }}
            {{ $multiple == 'true' ? 'multiple' : '' }} {{ $required == 'true' ? 'required' : '' }}>
        <div class="border border-dashed w-[100%] min-h-20 h-fit mt-3 rounded-md">
            <div class=" -translate-y-[15px] translate-x-2 w-fit h-fit">
                <small class="bg-card backdrop-blur-sm bg-transparent">selected images</small>
            </div>
            <div id="image-prevue_{{ $id }}">

            </div>
        </div>
        @error($name)
            <div class="text-left text-amber-500">
                {{ $message }}
            </div>
        @enderror
        <div class="text-left hidden text-amber-500 error_{{ $id }}">
        </div>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let element = document.getElementById("{{ $id }}");
            let imagePreview = document.querySelector('#image-prevue_{{ $id }}');
            if (element) {
                element.onblur = function() {
                    let value = this.value.trim();
                    let errorElement = this.parentElement.querySelector('.error_{{ $id }}');

                    if (this.hasAttribute('required') && (value == "")) {
                        errorElement.innerText = "{{ $errorName }} can't be empty.";
                        errorElement.classList.remove('hidden');

                    } else {
                        errorElement.classList.add('hidden');
                        errorElement.innerText = "";
                    }
                }
                element.onchange = function() {
                    const files = Array.from(this.files);
                    let html = "";
                    imagePreview.innerHTML = html;
                    files.forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            let src = e.target.result;
                            addToSelectedImage(src);
                        };
                        reader.readAsDataURL(file);
                    })
                };
            }
            function addToSelectedImage(url) {
                let html = `<div class="relative flex w-fit px-3 pb-3">
                                <img src=${url} alt="file.name" class="h-35 w-35 rounded-lg">
                                <div id='img-del_{{ $id }}' class="cursor-pointer select-none bg-gray-900/90 absolute right-[11.9px] top-0 text-center rounded-full  w-[20px] h-[20px]" >
                                    <i class="select-none cursor-pointer fa-solid fa-xmark  text-center translate-y-[-2.5px]"></i>
                                </div>
                            </div>`;
                imagePreview.innerHTML += html;
            }
            @if( $oldvalue )
                addToSelectedImage("{{ $oldvalue }}");
                console.log("{{ $oldvalue }}")
            @endif
        });
    </script>
@endpush
