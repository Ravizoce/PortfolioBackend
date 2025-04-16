<style>
    .fade {
        animation: fadeoute 2.8s ease-out;
    }

    @keyframes fadeoute {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 1;
        }

        70% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        85% {
            opacity: 0.8;
        }

        90% {
            opacity: 0.6;
        }

        95% {
            opacity: 0.4;
        }

        98% {
            opacity: 0.2;
        }

        100% {
            opacity: 0;
        }
    }
</style>
@php
    $messageType = session('success') ? 'success' : (session('failed') ? 'failed' : null);
    $message = session('success') ?? session('failed');
@endphp

@if ($messageType)
    <div
        class="toast fixed flex flex-col top-0 right-0 m-3 justify-center z-30 text-white h-fit max-h-32 w-72 rounded-md p-2 overflow-hidden text-ellipsis 
        {{ $messageType === 'success' ? 'bg-green-600/90' : 'bg-red-600/90' }}">
        <div class="toast-head">
            <h1><strong>{{ $message }}</strong></h1>
        </div>
    </div>
@endif



@push('scripts')
<script>
    window.onload = fetchtoast();

    function fetchtoast() {
        let toast = document.querySelector(".toast");
        if (toast) {
            fadeToast()
        }
    }

    function fadeToast() {
        let toast = document.querySelector(".toast");
        toast.classList.remove(["hidden", "fade"]);
        if (toast) {
            toast.classList.add("fade");
            setTimeout(() => {
                toast.classList.add("hidden");
            }, 2798);
        }
    }
</script>
@endpush
