@extends('admin.layouts.master')

@section('master.content')
<script src="/template/tinymce/js/tinymce/tinymce.min.js"></script>
<textarea name="" id="mytextarea"></textarea>
<script>
  tinymce.init({
  selector: 'mytextarea',  // change this value according to your HTML
  setup: function(editor) {
    editor.on('click', function(e) {
      console.log('Editor was clicked');
    });
  }
});
</script>
@endsection
