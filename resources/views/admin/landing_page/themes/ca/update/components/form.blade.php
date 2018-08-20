@php
  $formHash = str_random();
@endphp
<h4>Cấu hình form dữ liệu</h4>
<div class="table-responsive">
  <table class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th class="text-left">Hiện/ẩn</th>
        <th class="text-left">Tên hiển thị</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section->hash }}][form][show_full_name]" id="input_full_name_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_full_name_{{ $formHash }}" {{ @$section->info->show_full_name ? 'checked' : '' }}>
            <label for="input_full_name_{{ $formHash }}">Họ &amp; Tên</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section->hash }}][form][text_full_name]" id="toggle_full_name_{{ $formHash }}" type="text" class="form-control" placeholder="Họ và tên" {{ @$section->info->show_full_name ? '' : 'disabled' }} value="{{ @$section->info->text_full_name }}">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section->hash }}][form][show_email]" id="input_email_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_email_{{ $formHash }}" {{ @$section->info->show_email ? 'checked' : '' }}>
            <label for="input_email_{{ $formHash }}">Email</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section->hash }}][form][text_email]" id="toggle_email_{{ $formHash }}" type="text" class="form-control" placeholder="Địa chỉ Email" {{ @$section->info->show_email ? '' : 'disabled' }} value="{{ @$section->info->text_email }}">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section->hash }}][form][show_phone]" id="input_phone_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_phone_{{ $formHash }}" {{ @$section->info->show_phone ? 'checked' : '' }}>
            <label for="input_phone_{{ $formHash }}">SĐT</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section->hash }}][form][text_phone]" id="toggle_phone_{{ $formHash }}" type="text" class="form-control" placeholder="Số điện thoại" {{ @$section->info->show_phone ? '' : 'disabled' }} value="{{ @$section->info->text_phone }}">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section->hash }}][form][show_notes]" id="input_notes_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_notes_{{ $formHash }}" {{ @$section->info->show_notes ? 'checked' : '' }}>
            <label for="input_notes_{{ $formHash }}">Ghi chú</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section->hash }}][form][text_notes]" id="toggle_notes_{{ $formHash }}" type="text" class="form-control" placeholder="Ghi chú" {{ @$section->info->show_notes ? '' : 'disabled' }} value="{{ @$section->info->text_notes }}">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section->hash }}][form][show_extra_req]" id="input_extra_req_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_extra_req_{{ $formHash }}" {{ @$section->info->show_extra_req ? 'checked' : '' }}>
            <label for="input_extra_req_{{ $formHash }}">Yêu cầu thêm</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section->hash }}][form][text_extra_req]" id="toggle_extra_req_{{ $formHash }}" type="text" class="form-control" placeholder="Yêu cầu thêm" {{ @$section->info->show_notes ? '' : 'disabled' }} value="{{ @$section->info->text_extra_req }}">
        </td>
      </tr>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $(function () {
    $('body').on('change', '.toggle-checkbox', function (e) {
      e.preventDefault();

      var target = $(this).data('target');

      $(target).prop('disabled', this.checked == false);
    });
  });
</script>
