<!-- Blog -->
<div class="blog">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
          @foreach ($baiViet as $item)
          <!-- Blog post -->
          <div class="blog_post">
            <div class="blog_image" style="background-image:url({{ $item->hinh_dai_dien }})"></div>
            <div class="blog_text">{{ $item->tieu_de }}</div>
            <div class="blog_button"><a href="/{{ $item->url }}">Chi tiết</a></div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
