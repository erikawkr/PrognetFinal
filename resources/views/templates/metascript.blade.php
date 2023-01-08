<!-- Required Jquery -->
<!-- JavaScript -->
<script src="{{asset('assets/js/bundle.js?ver=2.9.1')}}"></script>
<script src="{{asset('assets/js/scripts.js?ver=2.9.1')}}"></script>

{{-- Vendor --}}
<script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>     
<script type="text/javascript" src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>     
<script type="text/javascript" src="{{asset('vendor/jquery-ui/jquery.blockUI.js')}}"></script>       
<script type="text/javascript" src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Datatable -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<!-- <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> -->

<script src="{{asset('vendor/datatables/dataTables.bootstrap5.min.js')}}"></script>

{{-- Select2 --}}
<script src="{{asset('vendor/select2/js/select2.min.js')}}"></script>
{{-- Form JQuery Validation --}}
<script src="{{asset('vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendor/jquery-validation/localization/messages_id.min.js')}}"></script>
{{-- Ajaxsubmit --}}
<script src="{{asset('vendor/jquery-validation/jquery.form.js')}}"></script>
{{-- SweetAlert2 --}}
<script src="{{asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>

{{-- Datepicker --}}
<script src="{{asset('vendor/datepicker/js/bootstrap-datepicker.js')}}"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- Chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: "Write your content here",
            height: 200,
        });
        // $('.summernote-disabled').summernote('disabled');

        $('.summernote-disabled').summernote({
            focus:false,
            toolbar: false,
        });
    });
     
</script>