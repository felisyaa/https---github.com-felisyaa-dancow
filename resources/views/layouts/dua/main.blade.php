<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <title>{{ $title }}</title> --}}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="/adminLTE/sanspro.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Trix Editor-->
  <link rel="stylesheet" href="/trix/trix.css">
  <script src="/trix/trix.js"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="/select2/dist/css/select2.min.css">
  <style>
    [data-toggle="collapse"].collapsed .right:before {
      content: "\f053";
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('layouts.dua.partial.navbar')
@include('layouts.dua.partial.sidebar')


  <div class="content-wrapper">
    <div class="container-fluid">
      {{-- <h3 class="py-3">{{ $title }}</h3> --}}

    @yield('content')

    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versi</b> 3.2.0-rc
    </div>
    Seni Musik | (´。• ᵕ •。`)
  </footer>

  <!-- Control Sidebar -->
  @include('layouts.dua.partial.control_sidebar')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLTE/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="/adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="/select2/dist/js/select2.min.js"></script>
<script>
  // $(function () {
  //   $("#example1")
  //     .DataTable({
  //       responsive: true,
  //       lengthChange: false,
  //       autoWidth: false
  //     })
  //     .buttons()
  //     .container()
  //     .appendTo("#example1_wrapper .col-md-6:eq(0)");
  // });
  $('#example1').DataTable( {
    responsive: true,
    "lengthChange": false
} );
  $(document).ready(function() {
    $('.js-example-responsive').select2();
});
</script>
</body>
</html>
