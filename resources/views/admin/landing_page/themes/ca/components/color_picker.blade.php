@php
  $colorPicker = str_random();
@endphp
<input id="gradient_colorpicker_{{ $colorPicker }}" name="data[{{ $section_name }}_{{ $sectionHash }}][background_color]" type="text" class="form-control" />
<script type="text/javascript">
  $(function () {
    $("#gradient_colorpicker_{{ $colorPicker }}").asColorPicker({
      mode: 'gradient',
    });
  });
</script>
