<!-- Bootstrap Core JavaScript -->
<script src="/template/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!-- Slimscroll JavaScript -->
<script src="/template/js/jquery.slimscroll.js"></script>
<!-- Wave Effects -->
<script src="/template/js/waves.js"></script>
<!-- Counter js -->
<script src="/template/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/template/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!-- Morris JavaScript -->
<script src="/template/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/template/plugins/bower_components/morrisjs/morris.js"></script>
<!-- Chartist chart -->
<script src="/template/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="/template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- Calendar JavaScript -->
<script src="/template/plugins/bower_components/moment/moment.js"></script>
<script src='/template/plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
<script src="/template/plugins/bower_components/calendar/dist/cal-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/template/js/custom.min.js"></script>
{{-- <script src="/template/js/dashboard1.js"></script> --}}
<!-- Custom tab JavaScript -->
<script src="/template/js/cbpFWTabs.js"></script>

<script src="/template/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="/template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Sweet-Alert  -->
<script src="/template/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="/template/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
<!-- jQuery x-editable -->
<script src="/template/plugins/bower_components/moment/moment.js"></script>
<script type="text/javascript" src="/template/plugins/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<!-- Tags input  -->
<script src="/template/bootstrap/dist/bootstrap-tagsinput.min.js"></script>
<script src="/template/js/mask.js"></script>
<!-- TinyMCE -->
<script src="{{ url('/template/plugins/bower_components/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('/template/plugins/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{ url('/template/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js') }}"></script>
<script src="{{ url('/template/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js') }}"></script>
<script src="{{ url('/template/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') }}"></script>
<!-- Magnific popup JavaScript -->
<script src="{{ url('/template/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{ url('/template/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{ url('/template/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
  $.fn.datepicker.defaults.format = "dd/mm/yyyy";
</script>
<script src="{{ url('/template/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/template/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ url('/template/plugins/fontawesome-iconpicker/fontawesome-iconpicker.min.js') }}"></script>
<script src="{{ url('/template/plugins/bower_components/switchery/dist/switchery.min.js') }}"></script>
<!--BlockUI Script -->
<script src="{{ url('/template/plugins/bower_components/blockUI/jquery.blockUI.js') }}"></script>
<!-- Chart JS -->
<script src="{{ url('/template/plugins/bower_components/Chart.js/Chart.min.js') }}"></script>


<script>
  // Switchery
  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  $('.js-switch').each(function () {
      new Switchery($(this)[0], $(this).data());
  });
</script>
<script src="{{ url('/assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
