<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href={{ asset('css/FontAwesom/css/fontawesome.css') }} rel="stylesheet" />
<link href={{ asset('css/FontAwesom/css/brands.css') }} rel="stylesheet" />
<link href={{ asset('css/FontAwesom/css/solid.css') }} rel="stylesheet" />

<link href={{ asset('css/MaterialIcon/materialagain.css') }} rel="stylesheet" />
<mat-icon class="material-icons-outlined" svgIcon="dark_mode-outline"></mat-icon>

<script src={{ asset('js/tailwind.js') }}></script>

<!--Replace with your tailwind.css once created-->
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->

<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: none;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    :root {
        --primary-button:#2b7fff;
        --secoandary-button:#04c352;
        --denger-button:#e7000b;
        --main-bg:#1e2939;
        --card-bg:#415167;
        --text-light:;
    }
    .bg-card{
        background-color: var(--card-bg);
    }
</style>
