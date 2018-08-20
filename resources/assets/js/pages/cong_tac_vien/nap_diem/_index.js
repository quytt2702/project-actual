$(function () {

  'use strict'

  console.log('Trang nạp điểm - Cộng tác viên');

  getLichSuNapDiem();
  getLichSuMuaHangBangMilk();

  function getLichSuMuaHangBangMilk() {
    console.log('Đang chạy getLichSuMuaHangBangMilk()');
    axios.get(`/cong-tac-vien/nap-diem/lich-su-mua-hang-bang-milk`)
      .then(res => {
        $('#lich_su_mua_hang_bang_milk').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '#pagi-lich-su-mua > .pagination a', function(e) {
      e.preventDefault();
      var param_show = $('#lich_su_mua_hang_bang_milk');
      var url = $(this).attr('href');
      console.log(url);
      getPaginate(url, param_show);
  });

  function getLichSuNapDiem() {
    console.log('Đang chạy getLichSuNapDiem()');

    axios.get(`/cong-tac-vien/nap-diem/table`)
      .then(res => {
        $('#lich_su_nap_diem_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }
  $('body').on('click', '#pagi-lich-su-nap > .pagination a', function(e) {
        e.preventDefault();
        var param_show = $('#lich_su_nap_diem_table');
        var url = $(this).attr('href');
        console.log(url);
        getPaginate(url, param_show);
    });

    function getPaginate(url, param_show) {
      axios.get(url)
        .then(res => {
          param_show.html(res.data);
        }).catch(err => {
          // Do something here
        });
    }

  $('#btnNap').on('click', function () {
    const payload = {
      seri: $('#seri').val(),
      ma_nap_diem: $('#ma_nap_diem').val(),
    }

    console.log(payload);

    axios.post('/cong-tac-vien/nap-diem', payload)
      .then(res => {
        getLichSuNapDiem();
        displayMessage(res);
      }).catch(err => {
        displayErrors(err);
      });
  });

  $('body').on('click', '#btnSearch', function() {

    var input_search = $('#input_search').val();

    axios.get(`/cong-tac-vien/nap-diem/search/${input_search}`)
      .then(res => {
        $('#lich_su_nap_diem_table').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
    });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });

    $('body').on('click', '.btnDetail', function () {
    console.log('dang bam []btnDetail]')
    const hash = $(this).attr('hash');

    axios.get(`/cong-tac-vien/nap-diem/show/${hash}`)
      .then(res => {
        $('#modal-show').html(res.data);
        $('#responsive-modal').modal('show');
      }).catch(err => {
        displayErrors(err);
      });
  });
});
