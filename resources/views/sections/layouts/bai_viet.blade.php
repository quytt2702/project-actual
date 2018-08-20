<!-- Home -->

<div class="home">
  <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ $baiViet->hinh_dai_dien }}" data-speed="0.8"></div>
</div>

<!-- Single Blog Post -->

<div class="single_post">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="single_post_title">{{ $baiViet->tieu_de }}</div>
        <div class="single_post_text">
          {!! $baiViet->noi_dung !!}
        </div>
      </div>
    </div>
  </div>
</div>
