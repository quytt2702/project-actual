@php
  $datePicker = str_random();
  $clockPicker = str_random();
  $touchSpinHour = str_random();
  $touchSpinMinute = str_random();
  $touchSpinSecond = str_random();
  $sectionId = str_random();
@endphp

<ul class="nav nav-tabs countdown-clock-tab" role="tablist">
  <input type="hidden" name="data[{{ $section->hash }}][countdown][type]" value="{{ $section->countdown_type }}">
  <li role="presentation" class="{{ $section->countdown_type == 'end_time' ? 'active' : '' }}">
    <a href="#end-time-{{ $sectionId }}" role="tab" data-toggle="tab" aria-expanded="true" data-type="end_time">
      <span>
        <i class="ti-shift-right"></i>
      </span>
    </a>
  </li>
  <li role="presentation" class="{{ $section->countdown_type == 'loop' ? 'active' : '' }}">
    <a href="#loop-{{ $sectionId }}" role="tab" data-toggle="tab" aria-expanded="false" data-type="loop">
      <span>
        <i class="ti-reload"></i>
      </span>
    </a>
  </li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane {{ $section->countdown_type == 'end_time' ? 'active' : '' }}" id="end-time-{{ $sectionId }}">
    <h5><strong>Kết thúc tại ngày giờ xác định</strong></h5>
    @php
      if ($section->countdown_type == 'end_time' && $section->countdown_time) {
        $dateStr = Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $section->countdown_time)->format('m/d/Y');
        $timeStr = Carbon\Carbon::createFromFormat('m/d/Y H:i:s', $section->countdown_time)->format('H:i');
      }
    @endphp
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <div class="input-group">
            <input id="datepicker_{{ $datePicker }}" name="data[{{ $section->hash }}][countdown][date]" type="text" class="form-control" placeholder="mm/dd/yyyy" value="{{ $dateStr or '' }}">
            <span class="input-group-addon">
              <i class="icon-calender"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div id="clockpicker_{{ $clockPicker }}" class="input-group" data-autoclose="true">
          <input type="text" class="form-control" name="data[{{ $section->hash }}][countdown][time]" placeholder="hh:mm" value="{{ $timeStr or '' }}">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </span>
        </div>
      </div>
      <script type="text/javascript">
        $(function () {
          $('#datepicker_{{ $datePicker }}').datepicker({
            autoclose: true,
            todayHighlight: true,
          });

          $('#clockpicker_{{ $clockPicker }}').clockpicker({
            donetext: 'Done',
          }).find('input').change(function () {
            console.log(this.value);
          });
        });
      </script>
    </div>
  </div>
  <div role="tabpanel" class="tab-pane {{ $section->countdown_type == 'loop' ? 'active' : '' }}" id="loop-{{ $sectionId }}">
    @php
      if ($section->countdown_type == 'loop') {
        extract(secondToTime($section->countdown_time));
      }
    @endphp
    <h5><strong>Lặp lại khi tải trang</strong></h5>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label class="control-label">Hours</label>
          <div class="input-group bootstrap-touchspin">
            <input id="touchspin_{{ $touchSpinHour }}" value="{{ $hours or 0 }}" name="data[{{ $section->hash }}][countdown][hour]" class="vertical-spin text-center" type="text" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" name="vertical-spin">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label class="control-label">Minutes</label>
          <div class="input-group bootstrap-touchspin">
            <input id="touchspin_{{ $touchSpinMinute }}" value="{{ $minutes or 0 }}" name="data[{{ $section->hash }}][countdown][minute]" class="vertical-spin text-center" type="text" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" name="vertical-spin">
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label class="control-label">Seconds</label>
          <div class="input-group bootstrap-touchspin">
            <input id="touchspin_{{ $touchSpinSecond }}" value="{{ $seconds or 0 }}" name="data[{{ $section->hash }}][countdown][second]" class="vertical-spin text-center" type="text" data-bts-button-down-class="btn btn-default btn-outline" data-bts-button-up-class="btn btn-default btn-outline" name="vertical-spin">
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(function () {
        $('#touchspin_{{ $touchSpinHour }}').TouchSpin();
        $('#touchspin_{{ $touchSpinMinute }}').TouchSpin({
          max: 59,
        });
        $('#touchspin_{{ $touchSpinSecond }}').TouchSpin({
          max: 59,
        });
      });
    </script>
  </div>
</div>
