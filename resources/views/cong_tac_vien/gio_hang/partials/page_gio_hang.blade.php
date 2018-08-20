<input type="hidden" id="thuong_doanh_thu" value="{{ $caiDat->phan_tram_thuong_doanh_thu_cap_1 }}">
<div class="col-md-9 col-lg-9 col-sm-7">
  <div class="panel panel-info">
    <div class="panel-heading">Đơn hàng của bạn ({{ $soLuong }} sản phẩm)</div>
    <div class="panel-wrapper collapse in" aria-expanded="true">
      <div class="panel-body">
        <div id="table_gio_hang" class="table-responsive">
          <table class="table table-bordered product-overview">
            <thead>
              <tr>
                <th>Hình ảnh</th>
                <th>Thông tin sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xoá</th>
              </tr>
            </thead>
            <tbody>
              @php
                $index = 0;
                $tongVND = 0;
                $tongMilk = 0;
              @endphp
              @if (empty($sanPham) || count($sanPham) === 0)
              <tr>
                <td colspan="6">Không có sản phẩm nào trong giỏ hàng</td>
              </tr>
              @else
              @foreach($sanPham as $item)
              @php
                $san_pham_gia_ban_thuc_te = $item->san_pham_gia_ban_thuc_te * (1 - $caiDat->phan_tram_thuong_doanh_thu_cap_1 / 100);
                $gia_milk =  $san_pham_gia_ban_thuc_te / $item->ti_gia_milk;
              @endphp
              <tr>
                <td width="150" class="text-center">
                  <img src="{{ $item->san_pham_hinh_dai_dien }}" alt="" width="80">
                </td>
                <td width="550">
                  <h5 class="font-500"><b>Tên sản phẩm: </b>{{ $item->san_pham_ten }}</h5>
                  <p style="text-align: justify; width: 95%">
                    @if (mb_strlen($item->san_pham_mo_ta) <= 100)
                      {!! $item->san_pham_mo_ta !!}
                    @else
                      {!! mb_substr($item->san_pham_mo_ta, 0, 100) !!}...
                    @endif
                  </p>
                </td>
                <td class="text-right" width="150" align="center">{{ number_format($san_pham_gia_ban_thuc_te) }} VND</td>
                <td width="20" class="text-right">
                  <input class="so_luong text-right" type="number" class="form-control" style="width: 40px;" value="{{ $item->san_pham_so_luong }}" hash="{{ $item->san_pham_id }}" index="{{ $index++ }}" san_pham_gia_ban_thuc_te="{{ $item->san_pham_gia_ban_thuc_te }}" ti_gia_milk="{{ $item->ti_gia_milk }}">
                </td>
                <td class="gia_ban text-right text-nowrap" width="150">
                  @php
                    $tongVND += $san_pham_gia_ban_thuc_te * $item->san_pham_so_luong;
                    $tongMilk += $gia_milk * $item->san_pham_so_luong;
                  @endphp
                    {{ number_format($san_pham_gia_ban_thuc_te * $item->san_pham_so_luong) }} VND
                </td>
                <td align="center" class="text-center"><a class="btnXoa" href="javascript:void(0)" class="text-inverse" title="" data-toggle="tooltip" data-original-title="Delete" data-code="{{ $item->san_pham_id }}"><i class="ti-trash text-dark"></i></a></td>
              </tr>
              @endforeach
              <tr style="color: #313131">
                <td colspan="4"><b>Chi phí giao hàng</b></td>
                <td colspan="2" class="text-right"><b>{{ number_format($phiShipCod) }} VND</b></td>
              </tr>
              @endif
            </tbody>
          </table>
          <hr>
          <div class="form-group">
            <label>Địa chỉ giao hàng</label>
            <input id="dia_chi_giao_hang" type="text" class="form-control" placeholder="Địa chỉ giao hàng" value="{{ $user->dia_chi_hien_tai }}">
          </div>
          <hr>
          <button class="btn btn-danger pull-right btnThanhToan"><i class="fa fa fa-shopping-cart"></i>  Thanh toán</button>
          <button class="btn btn-default btn-outline btnTroVe"><i class="fa fa-arrow-left"></i>  Trở về trang mua sắm</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3 col-lg-3 col-sm-5">
  <div class="white-box">
    <h3 class="box-title" style="text-align: center;">TỔNG QUAN</h3>
    <hr><p>Tổng giá trị thanh toán</p>
    <h3 id="tong_tien_milk">{{ $tongMilk + $phiShipCodTheoMilk }} MILK</h3><small> <i>hoặc</i> </small>
    <h3 id="tong_tien_vnd">{{ number_format($tongVND + $phiShipCod) }} VND</h3>
    <hr><p>Số tiền trong tài khoản của bạn</p>
    <h3>MILK: <span class="text-danger">{{ $tienNguoiDung->the_milk }}</span> </h3>
    <h3>VND : <span class="text-danger">{{ number_format($tienNguoiDung->tong_tien_vnd) }}</span> </h3>
    <hr>
    <div class="form-group">
      <label class="control-label">Phương thức thanh toán</label>
      <div class="radio-list">
        <div class="radio radio-info">
          <input type="radio" name="phuong_thuc_thanh_toan" id="radio2" value="MILK" checked>
          <label for="radio2">Thanh toán bằng MILK </label>
        </div>
        <div class="radio radio-info">
          <input type="radio" name="phuong_thuc_thanh_toan" id="radio3" value="COD">
          <label for="radio3">Thanh toán bằng COD</label>
        </div>
        <div class="radio radio-info">
          <input type="radio" name="phuong_thuc_thanh_toan" id="radio1" value="VND">
          <label for="radio1">Thanh toán bằng VND</label>
        </div>
      </div>
    </div>
    <button class="btn btn-success btnThanhToan"> Thanh toán</button>
    <button class="btn btn-default btn-outline btnTroVe"> Trở về</button>
  </div>
</div>
