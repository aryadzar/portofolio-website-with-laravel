    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
          &copy; Copyright <strong><span>aryadzar.my.id</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset("dashboard_asset/assets/vendor/apexcharts/apexcharts.min.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/chart.js/chart.umd.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/echarts/echarts.min.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/quill/quill.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/simple-datatables/simple-datatables.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/tinymce/tinymce.min.js")}}"></script>
  <script src="{{asset("dashboard_asset/assets/vendor/php-email-form/validate.js")}}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.0/tinymce.min.js" integrity="sha512-E2dqytT185qVoAL0sfqr39BLHEBQtmZze59ChMjYi4vRUW6BzIBLZAqErdQAAAJX8bkFq2kQgQL9Lbpm8Uuw0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: '.tinymce-editor',
    plugins: 'anchor autolink code charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
  });
</script>


  <!-- Template Main JS File -->
  <script src="{{asset("dashboard_asset/assets/js/main.js")}}"></script>
