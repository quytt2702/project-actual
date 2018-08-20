$(function () {
  'use strict'

  console.log('THỐNG KÊ THU NHẬP CỘNG TÁC VIÊN');

  var start = $('#picker_start');
  var thang;
  var nam;

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
    thang = date.substr(5,2)
    nam   = date.substr(0,4)

    axios.get(`/admin/cong-tac-vien/thong-ke-thu-nhap/table/${thang}/${nam}`)
      .then(res => {
        $('#thong_ke_thu_nhap').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  })

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var url = window.location.href + `/table/${thang}/${nam}` + url.substr(1);
    getLogPaginate(url);
  });

  function getLogPaginate(url) {
    console.log('dang chay [getLogPaginate]');
    console.log(url);
    axios.get(url)
      .then(res => {
          $('#thong_ke_thu_nhap').html(res.data);
        }).catch(err => {
          displayErrors(err);
        });
  }

  $('#btnThongKe').click();
})
