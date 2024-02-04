@php
$containerFooter = (isset($configData['contentLayout']) && $configData['contentLayout'] === 'compact') ? 'container-xxl' : 'container-fluid';
@endphp

<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ $containerFooter }}">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>document.write(new Date().getFullYear())
      </script>, تمام حقوق محفوظ برای {{config('variables.templateName')}} محفوظ است .
      </div>
      <div class="d-none d-lg-inline-block">
        <a href="#" target="_blank" class="footer-link me-4">اخبار</a>
        <a href="#" target="_blank" class="footer-link me-4">مستندات</a>
        <a href="#" target="_blank" class="footer-link d-none d-sm-inline-block">پشتیبانی</a>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
