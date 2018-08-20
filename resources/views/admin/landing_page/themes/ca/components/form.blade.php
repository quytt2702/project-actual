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
      @php
        $formHash = str_random();
      @endphp
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][show_full_name]" id="input_full_name_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_full_name_{{ $formHash }}">
            <label for="input_full_name_{{ $formHash }}">Họ &amp; Tên</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][text_full_name]" id="toggle_full_name_{{ $formHash }}" type="text" class="form-control" value="Họ và tên" disabled="true">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][show_email]" id="input_email_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_email_{{ $formHash }}">
            <label for="input_email_{{ $formHash }}">Email</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][text_email]" id="toggle_email_{{ $formHash }}" type="text" class="form-control" value="Địa chỉ Email" disabled="true">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][show_phone]" id="input_phone_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_phone_{{ $formHash }}">
            <label for="input_phone_{{ $formHash }}">SĐT</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][text_phone]" id="toggle_phone_{{ $formHash }}" type="text" class="form-control" value="Số điện thoại" disabled="true">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][show_notes]" id="input_notes_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_notes_{{ $formHash }}">
            <label for="input_notes_{{ $formHash }}">Ghi chú</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][text_notes]" id="toggle_notes_{{ $formHash }}" type="text" class="form-control" value="Ghi chú" disabled="true">
        </td>
      </tr>
      <tr>
        <td class="text-left">
          <div class="checkbox checkbox-success">
            <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][show_extra_req]" id="input_extra_req_{{ $formHash }}" type="checkbox" class="toggle-checkbox" data-target="#toggle_extra_req_{{ $formHash }}">
            <label for="input_extra_req_{{ $formHash }}">Yêu cầu thêm</label>
          </div>
        </td>
        <td>
          <input name="data[{{ $section_name }}_{{ $sectionHash }}][form][text_extra_req]" id="toggle_extra_req_{{ $formHash }}" type="text" class="form-control" value="Yêu cầu thêm" disabled="true">
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

      console.log('')

      $(target).prop('disabled', this.checked == false);
    });
  });
</script>
