<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script src="dist/snackbar.min.js"></script>
{{-- <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('plugins/notification/snackbar.min.js') }}"></script>
<script src="{{ asset('plugins/nicescroll/nicescroll.js') }}"></script>
<script src="{{ asset('plugins/currency/currency.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



<script>
    function noty() {
        Snackbar.show({text: 'Example notification text.'});
    }
</script>

<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>



<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
<script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>


<script src="plugins/table/datatable/datatables.js"></script>
<script src="plugins/table/datatable/custom_miscellaneous.js"></script>


@livewireScripts
