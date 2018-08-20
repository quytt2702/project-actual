@if (!empty($section->countdown_type) && !empty($section->countdown_time))
@php
  $clockName = str_random();

  $time = 0;

  switch ($section->countdown_type) {
    case 'end_time':
      $destination = Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $section->countdown_time);
      $time = $destination->timestamp - time();

      if ($time < 0) {
        $time = 0;
      }

      break;

    case 'loop':
      $time = (int) $section->countdown_time;

      break;
  }
@endphp
<div class="clock-countdown__wrapper">
  <div class="clock-countdown-{{ $clockName }}"></div>
  <script type="text/javascript">
    $(function () {

      (function ($) {
        FlipClock.Lang.Vietnamese = {
          'years'   : 'Năm',
          'months'  : 'Tháng',
          'days'    : 'Ngày',
          'hours'   : 'Giờ',
          'minutes' : 'Phút',
          'seconds' : 'Giây',
        };

        FlipClock.Lang['vi']         = FlipClock.Lang.Vietnamese;
        FlipClock.Lang['vi-vn']      = FlipClock.Lang.Vietnamese;
        FlipClock.Lang['vietnamese'] = FlipClock.Lang.Vietnamese;

      })(jQuery);

      var clock = new FlipClock($('.clock-countdown-{{ $clockName }}'), {{ $time }}, {
        countdown: true,
        clockFace: 'DailyCounter',
        language: 'vietnamese',
      });
    });
  </script>
</div>
@endif
