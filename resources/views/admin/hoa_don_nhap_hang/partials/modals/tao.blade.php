<div id="tao_moi_don_hang_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog" style="min-width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Nhập hàng vào kho</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="tab_logic">
          <thead>
            <tr>
              <th>#</th>
              <th style="min-width: 300px;">Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá nhập</th>
              <th style="min-width: 300px;">Nhà cung cấp</th>
              <th class="text-nowrap">Action</th>
            </tr>
            <tr>
              <td style="padding-top: 25px;">0</td>
              <td>
                <select id="san_pham" class="form-control">
                  @foreach($sanPham as $item)
                  <option value="{{ $item->id }}" san_pham_ten="{{ $item->san_pham_ten }}">[{{ $item->san_pham_ma }}] {{ $item->san_pham_ten }} ({{ number_format($item->san_pham_gia_ban_thuc_te) }} VND)</option>
                  @endforeach
                </select>
              </td>
              <td><input type="number" id="so_luong" value="1" class="form-control text-right"/></td>
              <td><input type="number" id="don_gia" value="1" class="form-control text-right"/></td>
              <td>
                <select id="nha_cung_cap" class="form-control">
                  @foreach($nhaCungCap as $item)
                  <option value="{{ $item->id }}" nha_cung_cap_ten="{{ $item->nha_cung_cap_ten }}">{{ $item->nha_cung_cap_ten }}</option>
                  @endforeach
                </select>
              </td>
              <td><button id="btnAddModal" class='btn btn-success'>+</button></td>
            </tr>
          </thead>
          <tbody id="chi_tiet_table">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger waves-effect waves-light" id="btnLuuModal" data-dismiss="modal" disabled>Lưu</button>
      </div>
    </div>
  </div>
</div>
