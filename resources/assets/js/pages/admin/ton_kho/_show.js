$(function () {

  'use strict'

  console.log('Trang chi tiet tồn kho');
  const hash = $('#body-chi-tiet-ton-kho').attr('hash');

  loadData();

  function loadData () {
    console.log('dang chay [loadData]');
    axios.get(`/admin/ton-kho/chi-tiet/${hash}/table`)
      .then(res => {
        $('#body-chi-tiet-ton-kho').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '.pagination a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    getPaginate(url);
  });

  function getPaginate(url) {
    console.log('dang chay [getPaginate]');
    axios.get(url)
      .then(res => {
        $('#body-chi-tiet-ton-kho').html(res.data);
      }).catch(err => {
        displayErrors(err);
      });
  }

  $('body').on('click', '#btnSearch', function() {
    console.log('click [btnSearch]');
    const search = $('#input_search').val();

    axios.get(`/admin/ton-kho/chi-tiet/${hash}/table/${search}`)
      .then(res => {
        $('#body-chi-tiet-ton-kho').html(res.data);
      }).catch(err => {
          displayErrors(err);
      })

  });

  $('body').on('keyup', '#input_search', function(e) {
    if (e.which == 13) {
      $('#btnSearch').click();
    }
  });
})
