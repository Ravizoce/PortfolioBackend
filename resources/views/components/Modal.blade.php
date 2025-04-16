@props([
    'id' => 'exampleModal',
    'class' => '',
    'footer' => true,
    'footer_content',
    'modal_title'=>null,
])
<div id="{{ $id }}" class="toogle-modal hidden top-0 left-0 w-screen h-screen bg-gray-700/40 absolute z-20"
    role="dialog" tabindex="-1">
    <div class="modal-dialog shadow-dark bg-slate-600/90 absolute top-0 left-1/2 -translate-x-1/2 min-w-96 max-h-[99%]  mt-4 rounded drop-shadow-lg shadow-dark {{ $class }} "
        role="document">
        <div class="modal-content rounded-md">
            <div class="modal-header flex justify-between items-center rounded-t bg-gray-700/70 p-2">
                <h5 class="modal-title font-bold" id="exampleModalLabel">{{ $modal_title ?? 'Modal title' }}</h5>
                <button type="button" class="close text-2xl cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr />
            <div class="modal-body p-3 text-black w-full overflow-y-auto max-h-[calc(100vh-130px)]">
                @if ($slot->isEmpty())
                    Content Here
                @else
                    {{ $slot }}
                @endif
            </div>
            @if ($footer)
                <hr />
                <div class="modal-footer w-full flex justify-end rounded-b bg-gray-700/70 overflow-auto h-[50%]">
                    @isset($footer_content)
                        {{ $footer_content }}
                    @else
                        <button type="button" class="close cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">close</span>
                        </button>
                    @endisset
                </div>
            @endif
        </div>
    </div>
</div>
