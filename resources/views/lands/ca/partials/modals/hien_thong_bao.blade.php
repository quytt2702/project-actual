<!-- Modal step 01 -->
<div>
  <div class="modal fade" id="hien_thong_bao_modal" role="dialog" style="overflow-y: auto">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="display: block;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-left">{{ $landingTheme->title }}</h4>
        </div>
        <div class="modal-body">
          <p>{{ $landingTheme->thong_bao }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          @if ($landingTheme->is_muon_ban === 'YES')
            <button type="button" class="btn btn-success btnChiTietThanhToan" data-dismiss="modal">Tiếp tục</button>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal step 01 -->
