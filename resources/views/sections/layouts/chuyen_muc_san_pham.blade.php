<!-- Blog -->
<div class="blog">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
          @foreach ($sanPham as $item)
          <!-- Blog post -->
          <div class="blog_post">
            <div class="blog_image" style="background-image:url({{ $item->san_pham_hinh_dai_dien }})"></div>
            <div class="blog_text">{{ $item->san_pham_ten }}</div>
            <div class="blog_button"><a href="/{{ $item->san_pham_url }}">Chi tiết</a></div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
