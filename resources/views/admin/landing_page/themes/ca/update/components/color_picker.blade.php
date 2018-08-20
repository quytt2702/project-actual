@php
  $colorPicker = str_random();
@endphp
<input id="gradient_colorpicker_{{ $colorPicker }}" name="data[{{ $section->hash }}][background_color]" type="text" class="form-control" value="{{ $section->background_color }}" />
<script type="text/javascript">
  $(function () {
    $("#gradient_colorpicker_{{ $colorPicker }}").asColorPicker({
      mode: 'gradient',
    });
  });
</script>
