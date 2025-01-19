 <!-- jQuery -->
 <script src="{{ asset('backendLTD/plugins/jquery/jquery.min.js') }}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('backendLTD/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('backendLTD/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- ChartJS -->
 <script src="{{ asset('backendLTD/plugins/chart.js/Chart.min.js ') }}"></script>
 <!-- Sparkline -->
 <script src="{{ asset('backendLTD/plugins/sparklines/sparkline.js') }}"></script>
 <!-- JQVMap -->
 <script src="{{ asset('backendLTD/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('backendLTD/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('backendLTD/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('backendLTD/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('backendLTD/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('backendLTD/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
 <!-- Summernote -->
 <script src="{{ asset('backendLTD/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('backendLTD/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('backendLTD/dist/js/adminlte.js') }}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('backendLTD/dist/js/pages/dashboard.js') }}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('backendLTD/dist/js/demo.js') }}"></script>
 {{-- datatable --}}
 <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
 
 {{-- toster --}}
 <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
 <!-- datatable -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

 <!-- DataTables Initialization -->
 <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
 </script>
 
 {!! Toastr::message() !!}