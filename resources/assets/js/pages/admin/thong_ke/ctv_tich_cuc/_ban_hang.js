$(function () {
  'use strict'

  console.log('CTV tích cực giới thiệu bán hàng');

  var start = $('#picker_start');

  start.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  });
  start.datepicker('setDate', 'today');

  $('body').on('click', '#btnThongKe', function () {
    console.log('Dang chay [btnThongKe]');
    const date  = start.val();
    const thang = date.substr(5,2)
    const nam   = date.substr(0,4)

    axios.get(`/admin/thong-ke/ctv-tich-cuc-ban-hang/table/${thang}/${nam}`)
      .then(res => {
        $('#thong_ke_ctv_tich_cuc').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  })

  $('#btnThongKe').click();

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    getLogPaginate(url);
  });

  function getLogPaginate(url) {
    console.log('dang chay [getLogPaginate]');

    axios.get(url)
      .then(res => {
          $('#thong_ke_ctv_tich_cuc').html(res.data);
        }).catch(err => {
          displayErrors(err);
        });
  }
})
