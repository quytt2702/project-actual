(async function () {

  'use strict';

  const payload = {
    q: 'Tien',
  };

  try {
    const payload = { q: 'Tien' };

    const { data } = await axios.post('/', payload);

    console.log(data);

  } catch (err) {}

  // Upload

  $(function () {

    const baseUrl = $('meta[name="base-url"]').attr('content');

    const selector = '#editor';
    // const plugins = 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern';
    const plugins = [
      'advlist autolink lists link image charmap print preview anchor textcolor',
      'searchreplace visualblocks fullscreen',
      'insertdatetime media table contextmenu'
    ];
    const toolbar = 'fontselect fontsizeselect | insert | undo redo | image formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help';
    const content_css = [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    ];
    const config = {
      selector,
      plugins,
      toolbar,
      content_css,
      font_formats: 'Lato=Lato,helvetica,sans-serif;Arial=arial,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
      height: 500,
      images_upload_url: '/upload/images',
      images_upload_handler: async (blobInfo, success, failure) => {

        const formUpload = new FormData();
        formUpload.append('image', blobInfo.blob());

        const { data: { location } } = await axios.post('/upload/images', formUpload);

        success(location);
      },
    };

    // Initialize
    tinymce.init(config);

  });


})();
