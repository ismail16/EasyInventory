
  <!-- Main Footer -->
  <footer class="main-footer" style="position: relative;">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io/">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-beta.2
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend_assets/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('backend_assets/dist/js/demo.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('backend_assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('backend_assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend_assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('backend_assets/plugins/jquery-mapael/maps/world_countries.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend_assets/plugins/chart.js/Chart.min.js') }}"></script>

<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="{{ mix('js/app.js') }}"></script>

<link rel="stylesheet" type="text/css" href="https://www.johnhopkinspress.com/datetime_picker/jquery.datetimepicker.min.css"/>
<script src="https://www.johnhopkinspress.com/datetime_picker/bootstrap.min.js"></script>
<script src="https://www.johnhopkinspress.com/datetime_picker/jquery.datetimepicker.js"></script>

<!-- PAGE SCRIPTS -->
{{-- <script src="{{ asset('backend_assets/dist/js/pages/dashboard2.js') }}"></script> --}}
  @stack('scripts')
</body>
</html>