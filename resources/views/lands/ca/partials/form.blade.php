@php
  $formKey = str_random();
@endphp
<div id="modal_{{ $formKey }}"></div>
@if (!empty($info))
<div class="contact_from" style="margin-bottom: 20px;">
  @foreach(request()->all() as $key => $value)
  <input type="hidden" name="{{ $key }}" value="{{ $value }}">
  @endforeach
  <!-- Message Input Area Start -->
  <div class="contact_input_area contact_input_area_{{ $formKey }}">
    <div class="row">
      <input type="hidden" name="url" value="{{ $theme->url }}">
      @if ($info->show_full_name)
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" name="ho_ten" placeholder="{{ $info->text_full_name }}">
        </div>
      </div>
      @endif
      @if ($info->show_email)
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" name="email" placeholder="{{ $info->text_email }}">
        </div>
      </div>
      @endif
      @if ($info->show_phone)
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" name="sdt" placeholder="{{ $info->text_phone }}">
        </div>
      </div>
      @endif
      @if ($info->show_notes)
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control" name="notes" rows="4" placeholder="{{ $info->text_notes }}"></textarea>
        </div>
      </div>
      @endif
      @if ($info->show_extra_req)
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control" name="extra_req" rows="4" placeholder="{{ $info->text_extra_req }}"></textarea>
        </div>
      </div>
      @endif
      <div class="col-md-12">
        <button class="btnSendNow btn submit-btn">{{ $theme->ten_nut }}</button>
      </div>
    </div>
  </div>
  <!-- Message Input Area End -->
</div>
@endif
<script>
  $(function () {
    $('body').on('click', '.contact_input_area_{{ $formKey }} .btnSendNow', function (e) {
      $.ajax({
        method: 'GET',
        url: '/khach-hang/thong-bao-modal',
        data: {
          _token: '{{ csrf_field() }}',
          url: $('.contact_input_area_{{ $formKey }} input[name=url]').val(),
          ho_ten       : $('.contact_input_area_{{ $formKey }} input[name=ho_ten]').val(),
          email        : $('.contact_input_area_{{ $formKey }} input[name=email]').val(),
          sdt          : $('.contact_input_area_{{ $formKey }} input[name=sdt]').val(),
          ghi_chu      : $('.contact_input_area_{{ $formKey }} textarea[name=notes]').val(),
          yeu_cau_them : $('.contact_input_area_{{ $formKey }} textarea[name=extra_req]').val(),
          link         : window.location.pathname,
        }
      }).done(function (res) {
        $('#modal_{{ $formKey }}').html(res);
        $('#hien_thong_bao_modal').modal('show');
      });
    });

    $('body').on('click', '#modal_{{ $formKey }} .btnChiTietThanhToan', function () {
      console.log('Đã bấm [btnChiTietThanhToan]');

      $.ajax({
        method: 'GET',
        url: '/khach-hang/chi-tiet-thanh-toan-modal',
        data: {
           _token: '{{ csrf_token() }}',
          url          : $('.contact_input_area_{{ $formKey }} input[name=url]').val(),
          ho_ten       : $('.contact_input_area_{{ $formKey }} input[name=ho_ten]').val(),
          email        : $('.contact_input_area_{{ $formKey }} input[name=email]').val(),
          sdt          : $('.contact_input_area_{{ $formKey }} input[name=sdt]').val(),
          ghi_chu      : $('.contact_input_area_{{ $formKey }} textarea[name=notes]').val(),
          yeu_cau_them : $('.contact_input_area_{{ $formKey }} textarea[name=extra_req]').val(),
          link         : window.location.pathname,
        }
      }).done(function (data) {
        $('#modal_{{ $formKey }}').html(data);
        $('#chi_tiet_thanh_toan_modal').modal('show');
      });
    });

    $('body').on('click', '.dimissModal', function() {
      $('.modal-backdrop.fade.show').remove();
    });

    $('body').on('change', 'thanh_toan_truc_tuyen', function () {
      if ($('#thanh_toan_truc_tuyen').prop('checked')) {
        $('#chuc_nang_cap_nhat').css('visibility', 'visible');
      } else {
        $('#chuc_nang_cap_nhat').css('visibility', 'hidden');
      }
    });

    $('body').on('change', '#thanh_toan_cod', function () {
      if ($('#thanh_toan_truc_tuyen').prop('checked')) {
        $('#chuc_nang_cap_nhat').css('visibility', 'visible');
      } else {
        $('#chuc_nang_cap_nhat').css('visibility', 'hidden');
      }
    });
  });



</script>


