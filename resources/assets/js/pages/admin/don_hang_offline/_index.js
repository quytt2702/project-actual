$(function () {

  'use strict'

  console.log('Trang đơn hàng offline - List');

  getDonHangOffline();

  function getDonHangOffline() {
    console.log('Đang chạy [getDonHangOffline]');

    axios.get(`/admin/don-hang-offline/table`)
      .then(res => {
        $('#don_hang_offline_body').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnXoa', function () {
    console.log('Đang click [btnXoa]');

    const hash = $(this).data('code');

    swal({
      title: "Bạn đã chắc chắn chưa?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Có",
      cancelButtonText: "Không",
      closeOnConfirm: true,
      closeOnCancel: true
    },
    function(){
      axios.delete(`/admin/don-hang-offline/${hash}`)
      .then(res => {
        getDonHangOffline();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
    });
  });

  $('body').on('click', '.btnChiTiet', function() {
    console.log('Đã bấm [btnChiTiet]');

    const txid = $(this).data('code');

    axios.get(`/admin/hoa-don-ban-hang/cong-tac-vien/${txid}/chi-tiet`)
      .then(res => {
        $('#modal').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });

});
