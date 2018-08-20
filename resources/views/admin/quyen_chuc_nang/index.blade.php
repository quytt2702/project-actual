@extends('admin.layouts.master')
@section('master.bodyclass', 'quyen_chuc_nang')
@section('master.title', 'Quyền chức năng')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-5">
    <div class="white-box">
      <h3 class="box-title">Quyền</h3>
      <div class="scrollable">
        <div class="table-responsive">
          <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          </div><table id="demo-foo-addrow" class="table m-t-30 contact-list footable-loaded footable" data-page-size="10">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php
              $index = 1;
              @endphp
              @foreach($nhomQuyen as $item)
              <tr class="list-quyen" style="display: table-row;" hash="{{ $item->id }}">
                <td>{{ $index++ }}</td>
                <td>{{ $item->ten_nhom }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Xem"><i class="ti-eye" aria-hidden="true"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{-- file:///Users/macbookpro/Downloads/ampleadmin/ampleadmin-html/ampleadmin-sidebar/faq.html --}}
  <div id="quyen_chuc_nang_body" class="col-md-7">
  </div>
  @endsection
