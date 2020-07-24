<!-- ============================================================== -->
<!-- All SCRIPTS AND JS LINKS BELOW  -->
<!-- ============================================================== -->

<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Compulsory JS-->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{ asset('/plugins/vendors/toast-master/js/jquery.toast.js') }}"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Compulsory JS END-->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script>
  new WOW().init();
</script> 
<script>
$(document).ready(function () {
  @if(\Session::has('message')) 
      $.toast({
          heading: 'Success!',
          position: 'bottom-right',
          text:  '{{session()->get('message')}}',
          loaderBg: '#ff6849',
          icon: 'success',
          hideAfter: 3000,
          stack: 6
      });
  @endif
  @if(\Session::has('flash_message')) 
      $.toast({
          heading: 'Error!',
          position: 'bottom-right',
          text:  '{{session()->get('flash_message')}}',
          loaderBg: '#ff6849',
          icon: 'error',
          hideAfter: 3000,
          stack: 6
      });
  @endif
})
</script>
