{{-- STYLES PLANTILLA --}}
<link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/js/loader.js') }}"></script>

<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />

<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" class="dashboard-sales" />
{{-- FIN STYLES PLANTILLA --}}
<link ref="stylesheet" type="text/css" href="dist/snackbar.min.css" />

<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" type="text/css" />
<style>
    aside {
        display: none !important;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #ffffff;
        background-color: #3b3f5c;
        border-color: #3b3f5c;
    }

    @media (max-width:480px) {
        .mtmobile {
            margin-bottom: 20px !important;
        }

        .mbmobile {
            margin-bottom: 10px !important;
        }

        .hideonm {
            display: none !important;
        }

        .indblock {
            display: block;
        }
    }

</style>


@livewireStyles
