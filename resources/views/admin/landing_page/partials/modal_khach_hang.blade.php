<div id="responsive-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog modal-lg">
    <div class="row m-t-30">
      <div class="col-md-12">
        <div class="white-box">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <div class="box-title">CHI TIẾT KHÁCH HÀNG</div>

          <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Số điện thoai</th>
                  <th>Ngày tạo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $khachHang->ho_ten }}</td>
                  <td class="text-primary">{{ $khachHang->email }}</td>
                  <td>{{ $khachHang->sdt }}</td>
                  <td>{{ $khachHang->created_at }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
