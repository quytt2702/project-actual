$(function () {
  'use strict'

  console.log('Thong Ke Hoa Don Ban Hang Ngay Thang Nam');

  var start = $('#picker_start');
  var end   = $('#picker_end');

  start.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay));
    }
  });
  start.datepicker('setDate', 'today');

  end.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, inst.selectedDay));
    }
  });
  end.datepicker('setDate', 'today');

  $('body').on('click', '#btnThongKe', function () {
    console.log('Dang chay [btnThongKe]');

    const dateStart = start.val();
    const dateEnd   = end.val();

    axios.get(`/admin/thong-ke/hoa-don-ban-hang/ngay-thang-nam/table-ngay-thang-nam/${dateStart}/${dateEnd}`)
      .then(res => {
        $('#thong_ke_hoa_don_ngay_thang_nam').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  });

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
        $('#thong_ke_hoa_don_ngay_thang_nam').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.btnDetail', function () {
    console.log('dang bam []btnDetail]')
    const hash = $(this).attr('hash');

    axios.get(`/admin/thong-ke/hoa-don-ban-hang/ngay-thang-nam/${hash}`)
      .then(res => {
        $('#modal-hd-ngay-thang-nam').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });
})
