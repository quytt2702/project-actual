@extends('admin.layouts.master')
@section('master.bodyclass', 'nguoi_dung_ctv')
{{-- fix here --}}
@section('master.title', 'Đại lý - Cộng tác viên')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title">Đại lý</h3>
      <div class="scrollable">
        <div class="table-responsive">
          <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          </div><table id="demo-foo-addrow" class="table m-t-30 contact-list footable-loaded footable" data-page-size="10">
            <thead>
              <tr>
                <th>Email</th>
                <th>Tên</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach($daiLy as $item)
              <tr class="list-user" style="display: table-row;" hash="{{ $item->email }}">
                <td>{{ $item->email }}</td>
                <td>{{ $item->ho_va_ten }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Xem"><i class="fa fa-eye text-primary m-r-10" aria-hidden="true"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <div class="white-box">
      <h3 class="box-title">Cộng tác viên</h3>
      <div class="row">
        <div class="col-xs-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs m-b-15" role="tablist">
            <li id="tab_01" role="presentation" class="active"><a class="lang" value="1" href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Chưa có đại lý</span></a></li>
            <li id="tab_02" role="presentation" class=""><a class="lang" value="2" href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Quản lý bởi đại lý khác</span></a></li>
            <li id="tab_03" role="presentation" class=""><a class="lang" value="2" href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Quản lý bởi tôi</span></a></li>
          </ul>
          <!-- Tab panes -->
        </div>
      </div>
      <div class="scrollable">
        <div id="cong_tac_vien_table" class="table-responsive">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
