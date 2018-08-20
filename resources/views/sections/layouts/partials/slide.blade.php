<div class="slider-section">
  <div class="slide__wrapper">
    @foreach ($noiDungSlider as $item)
    <div class="slide__item">
      <div class="banner_content">
        <div class="button banner_button"><a href="{{ $item->url_slider }}">{{ $item->ten_hien_thi }}</a></div>
      </div>
      <img src="{{ $item->image }}">
    </div>
    @endforeach
  </div>
</div>
<style type="text/css">
  .slick-arrow {
    display: none !important;
  }
  .slide__wrapper {
    position: relative;
    height: 500px;
  }
  .slide__item img {
    width: 100%;
    height: 450px;
    object-fit: cover;
  }
  .banner_content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
  }
</style>
<script type="text/javascript">
  $(function () {
    $('.slide__wrapper').slick({
      autoplay: true,
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  });
</script>
