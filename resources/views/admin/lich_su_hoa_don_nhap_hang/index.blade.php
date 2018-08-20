@extends('admin.layouts.master')
@section('master.bodyclass', 'hoa_don_nhap_hang')
@section('master.title', 'Lịch sử nhập hàng')
@section('master.content')
<div id="modal"></div>
<div class="row m-t-30">
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title">Lịch sử đơn hàng</h3>
      <div class="scrollable">
        <div class="table-responsive">
          <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          </div>
          <div>
            <table id="demo-foo-addrow" class="table m-t-30 contact-list footable-loaded footable" data-page-size="10">
              <thead>
                <tr>
                  <th>Email người sửa</th>
                  <th>Ngày chỉnh sửa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($logHoaDonNhapHang as $item)
                <tr class="danh_sach_lich_su_don_hang" hash="{{ $item->ngay_thay_doi }}">
                  <td>{{ $item->email_cap_nhat }}</td>
                  <td class="text-center">{{ $item->ngay_thay_doi }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="white-box">
      <h3 class="box-title">Chi tiết sửa đơn nhập hàng</h3>
      <div class="row">
      </div>
      <div class="scrollable">
        <div id="chi_tiet_sua_don_nhap_hang_table" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
