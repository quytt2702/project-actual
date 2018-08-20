$(function () {

  'use strict'

  console.log('Trang quản lý tabs');

  const getTabs = async () => {
    return new Promise((resolve, reject) => {
      console.log('Đang chạy getTabs()');
      $('#icon-refresh').css('visibility', 'visible');

      axios.get('/admin/tabs/table')
      .then(res => {
        $('#tabs-body').html(res.data);
          $('#icon-refresh').css('visibility', 'hidden');

          resolve();
        }).catch(err => {
          displayErrors(err);
          $('#icon-refresh').css('visibility', 'hidden');
          reject(err);
        });
      })
  }

  const fetchTabs = () => {
    return new Promise((resolve, reject) => {
      getTabs()
        .then(() => {
          $('.ten_tab').editable({
            showbuttons: 'bottom',
            success: function(response, newValue) {
              const hash = $(this).attr('hash');

              const payload = {
                'ten_tab' : newValue,
              };

              axios.put(`/admin/tabs/${hash}/edit-name`, payload)
                .then(res => {
                  fetchTabs();
                  displayMessage(res);
                }).catch(err => {
                  displayErrors(err);
                });
            }
          });
        })
        .catch(() => {
          //
        });
    });
  };

  fetchTabs();


  $('body').on('click', '.btnEditStatus', function () {
    const hash = $(this).attr('hash');

    axios.put(`/admin/tabs/${hash}/edit-status`)
      .then(res => {
        displayMessage(res);
        fetchTabs();
      }).catch(err => {
        displayErrors(err);
    });
  });

});
