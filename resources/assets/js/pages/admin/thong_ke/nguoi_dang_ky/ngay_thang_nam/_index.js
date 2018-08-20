$(function () {
  'use strict'

  console.log('Thống kê người đăng ký (Ngày, tháng, năm)');

  var start = $('#picker_start');
  var end   = $('#picker_end');

  start.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth,inst.selectedDay));
    }
  });
  start.datepicker('setDate', 'today');

  end.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth,inst.selectedDay));
    }
  });
  end.datepicker('setDate', 'today');

  $('body').on('click', '#btnThongKe', function () {
    console.log('Dang chay [btnThongKe]');

      const dateStart = start.val();
      const dateEnd   = end.val();

    console.log(dateStart, dateEnd);
    axios.get(`/admin/thong-ke/nguoi-dang-ky/ngay-thang-nam/table-ngay-thang-nam/${dateStart}/${dateEnd}`)
      .then(res => {
        if (res.data.message == '') {
          $('#thong_ke_nguoi_dk_ngay_thang_nam').html(res.data.view);
        } else {
          window.toastr.error(res.data.message);
        }
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('#btnThongKe').click();

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    window.page = window.getPageFromUrl(url);
    getLogPaginate(url);
  });

  function getLogPaginate(url) {
    console.log('dang chay [getLogPaginate]');

    axios.get(url)
      .then(res => {
        if (res.data.message == '') {
          $('#thong_ke_nguoi_dk_ngay_thang_nam').html(res.data.view);
        } else {
          window.toastr.error(res.data.message);
        }
      }).catch(err => {
        displayErrors(err);
      });
  }
})
