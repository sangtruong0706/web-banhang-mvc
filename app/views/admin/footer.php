<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="copyright">
    <strong><span><?= WEBSITE_TITLE ?></span></strong>
  </div>
  <div class="credits">
    <a href="https://ctuet.edu.vn/">Trường đại học kỹ thuật - công nghệ Cần Thơ</a>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= ASSETS ?>admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/quill/quill.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= ASSETS ?>admin/assets/vendor/php-email-form/validate.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<!-- Template Main JS File -->
<script src="<?= ASSETS ?>admin/assets/js/main.js"></script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</body>

</html>