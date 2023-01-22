  <!-- Vendor JS Files -->
  <script src="{{ asset('frontendhelpdesk/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('frontendhelpdesk/assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" referrerpolicy="no-referrer"></script>
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontendhelpdesk/assets/js/main.js') }}"></script>

@yield('scripts')
@stack('scripts')


