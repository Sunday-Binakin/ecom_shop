<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->
<script src="{{ asset('admin/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#data_table').DataTable();
} );
// <script type="text/javascript">
// $(document).ready( function () {
//     $('#brands_table').DataTable();
// } );
</script>
