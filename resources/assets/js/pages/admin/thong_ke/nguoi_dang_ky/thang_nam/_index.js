$(function () {
  'use strict'

  console.log('Thống kê người đăng ký (tháng, năm)');

  var start = $('#picker_start');
  var end   = $('#picker_end');

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

  end.datepicker( {
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  });
  end.datepicker('setDate', 'today');
  //khi click vào [btnThongKe] sẽ load ajax để show ra dữ liệu bên tay trái
  $('body').on('click', '#btnThongKe', function () {
    console.log('Dang chay [btnThongKe]');
    const dateStart = start.val();
    const dateEnd   = end.val();

    axios.get(`/admin/thong-ke/nguoi-dang-ky/thang-nam/sider-bar/${dateStart}/${dateEnd}`)
      .then(res => {
        $('#thong_ke_nguoi_dk_thang_nam').html(res.data);
      }).catch(err => {
        displayErrors(err);
      })
  })

  // khi click vào [valueThangNam] sẽ gọi ajax đến hàm tableThangNam() để đổ dữ liệu vào view
  $('body').on('click', '.valueThangNam', function () {
    console.log('Dang chay [valueThangNam]');
    var date = $(this).attr('date');

    axios.get(`/admin/thong-ke/nguoi-dang-ky/thang-nam/table-thang-nam/${date}`)
      .then(res => {
        $('.show-table').html(res.data);
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
          $('.show-table').html(res.data);
        }).catch(err => {
          displayErrors(err);
        });
  }
})
