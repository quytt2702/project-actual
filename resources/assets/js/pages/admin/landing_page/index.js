$(function () {
  $('body').on('click', '.btn-xoa-page', async function (e) {

    e.preventDefault();

    const link = this.href;

    swal({
      title: "Bạn có chắc chắn muốn xoá?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Xoá",
      cancelButtonText: "Huỷ",
      closeOnConfirm: false,
      html: false
    }, async function () {

      try {
        await axios.delete(link);

        swal({
          title: "Đã xoá!",
          text: "Trang Landing Page của bạn đã được xoá",
          type: "success",
          closeOnConfirm: true,
        }, function () {
          window.location = window.location;
        });

        setTimeout(function () {
          window.location = window.location;
        }, 5000);

      } catch (err) {
        swal("Lỗi!", "Có lỗi xảy ra trong quá trình xoá. Xin vui lòng thử lại.", "success");
      }

    });

  });

});
