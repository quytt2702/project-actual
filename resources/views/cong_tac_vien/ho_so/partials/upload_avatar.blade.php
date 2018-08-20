<div id="hoSoUploadAvatarDropify" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="{{ route('cong_tac_vien.ho_so.upload_avatar') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Thay Đổi Ảnh Đại Diện</h4>
        </div>
        <div class="modal-body">
            <input id="avatarUploader" type="file" name="avatar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light">Thay Đổi</button>
        </div>
      </div>
    </div>
  </form>
</div>
