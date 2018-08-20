<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/menu_editor/bs-iconpicker/css/bootstrap-iconpicker.min.css" rel="stylesheet">
<script src='/menu_editor/jquery-menu-editor.min.js'></script>
<script src='/menu_editor/bs-iconpicker/js/iconset/iconset-fontawesome-4.7.0.min.js'></script>
<script src='/menu_editor/bs-iconpicker/js/bootstrap-iconpicker.js'></script>
<div class="col-md-12 m-t-20" style="border-top: 1px solid #ddd;">
  <h3 class="m-t-30">Cài đặt menu ngang</h3>
</div>
<div class="col-md-6">
  <form id="frmEdit" class="form-horizontal">
    <div class="form-group m-b-0">
      <label for="text" class="col-sm-2 control-label">Hiển thị</label>
      <div class="col-sm-10">
        <div class="input-group">
          <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Tên hiển thị">
          <div class="input-group-btn">
            <button type="button" id="myEditor_icon" class="btn btn-default iconpicker form-control" data-iconset="fontawesome" data-original-title="" title=""><i></i><input type="hidden"><span class="caret"></span></button>
          </div>
          <input type="hidden" name="icon" class="item-menu">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="href" class="col-sm-2 control-label">URL</label>
      <div class="col-sm-10">
        <input type="text" class="form-control item-menu url_search" id="href" name="href" placeholder="URL">
      </div>
    </div>
  </form>
  <button type="button" id="btnAddMenuNgang" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Thêm</button>
  <button type="button" id="btnUpdateMenuNgang" class="btn btn-primary pull-right m-r-10" disabled="disabled"><i class="fa fa-refresh"></i> Cập nhật</button>
</div>
<div class="col-md-6">
  <ul id="myEditor" class="sortableLists list-group">
  </ul>
  <div class="form-group">
    <button id="btnLuuMenuNgang" type="button" class="btn btn-success">Lưu</button>
  </div>
  <div class="form-group hidden"><textarea id="out" class="form-control" cols="50" rows="10"></textarea>
  </div>
</div>
<script>
  jQuery(document).ready(function () {
    // menu items
    // var strjson = [{"href":"http://home.com","icon":"fa fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fa fa-bar-chart-o","text":"Opcion2"},{"icon":"fa fa-cloud-upload","text":"Opcion3"},{"icon":"fa fa-crop","text":"Opcion4"},{"icon":"fa fa-flask","text":"Opcion5"},{"icon":"fa fa-map-marker","text":"Opcion6"},{"icon":"fa fa-search","text":"Opcion7","children":[{"icon":"fa fa-plug","text":"Opcion7-1","children":[{"icon":"fa fa-filter","text":"Opcion7-1-1"}]}]}];
    //icon picker options
    var iconPickerOptions = {searchText: 'Icon...', labelHeader: '{0} de {1} Pags.'};
    //sortable list options
    var sortableListOptions = {
      placeholderCss: {'background-color': 'cyan'}
    };

    load();
    function load() {
      const ngon_ngu = $('#idNgonNgu').val();

      axios.get(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/menu-ngang`)
        .then(res => {
           editor.setData(res.data);
        }).catch(err => {
          displayErrors(err);
        });

    }

    var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions, labelEdit: 'Edit'});
    editor.setForm($('#frmEdit'));
    editor.setUpdateButton($('#btnUpdateMenuNgang'));

    $('#btnReload').on('click', function () {
        // editor.setData(strjson);
        editor.setData($("#out").val());
      });

    $('#btnLuuMenuNgang').on('click', function () {
      const ngon_ngu = $('#idNgonNgu').val();
      const payload = {
        noi_dung: editor.getString(),
      };

      console.log(payload);

      axios.post(`/admin/cai-dat-ngon-ngu/${ngon_ngu}/menu-ngang`, payload)
        .then(res => {
          displayMessage(res);
        }).catch(err => {
          displayErrors(err);
        });

      // $("#out").text(str);

    });

    $("#btnUpdateMenuNgang").click(function(){
      editor.update();
    });

    $('#btnAddMenuNgang').click(function(){
      editor.add();
    });
  });
</script>
