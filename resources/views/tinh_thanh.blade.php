@extends('admin.layouts.master')
@section('master.title', 'Tỉnh thành')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <div class="box-title">Tỉnh thành</div>
      <div class="row">
        <div id="tinh_thanh_body">
          <section class="tinh_thanh">
            @include('load')
          </section>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');
        console.log(url);
        getTinhThanh(url);
        // window.history.pushState("", "", url);
    });

    function getTinhThanh(url) {
      axios.get(url)
        .then(res => {
          console.log(res.data);
          $('.tinh_thanh').html(res.data);
        }).catch(err => {
          // Do something here
        });
    }
});
</script>

@endsection
