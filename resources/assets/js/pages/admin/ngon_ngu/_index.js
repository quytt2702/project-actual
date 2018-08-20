$(function () {

  'use strict'

  getNgonNgu();

  async function getNgonNgu() {
    console.log('Đang chạy getNgonNgu()');

    $('#icon-refresh-lang').css('visibility', 'visible');

    axios.get('/admin/ngon-ngu/table')
      .then(res => {
        $('#ngon-ngu-body').html(res.data);
        $('#icon-refresh-lang').css('visibility', 'hidden');
      }).catch(err => {
        displayErrors(err);
        $('#icon-refresh-lang').css('visibility', 'hidden');
    });
  }

  $('body').on('click', '.btnActive', function () {
    const payload = {
      id : $(this).attr('txid'),
    };

    axios.post('/admin/ngon-ngu/active', payload)
      .then(res => {
        displayMessage(res);
        getNgonNgu();
      }).catch(err => {
        displayErrors(err);
    });
  });

  $('body').on('click', '.btnNotActive', function () {
    const payload = {
      id : $(this).attr('txid'),
    };

    axios.post('/admin/ngon-ngu/not-active', payload)
      .then(res => {
        displayMessage(res);
        getNgonNgu();
      }).catch(err => {
        displayErrors(err);
    });
  });

  $('body').on('keyup', '.url_search', function () {
    const ngon_ngu = $(this).data('code');
    var key = $(this).val();
    console.log('Đang search với từ khoá: ' + key);

    if (key == '') {
      return ;
    }

    axios.get(`/admin/ngon-ngu/${key}/${ngon_ngu}/search`)
      .then(res => {
        console.log(res.data);
        $(this).autocomplete({
          source: res.data
        });
      }).catch(err => {
        console.log(err);
        displayErrors(err);
      });
  });

  $('#btnLuu').on('click', function () {
    console.log('Đang chạy [btnLuu]');

    var urls = [];
    $('.url_search').each(function() {
      urls.push({
        id : $(this).data('code'),
        url: $(this).val(),
      });
    });;

    console.log(urls);

    axios.post('/admin/ngon-ngu', urls)
      .then(res => {
        displayMessage(res);
        getNgonNgu();
      }).catch(err => {
        displayErrors(err);
    });

  });
});
