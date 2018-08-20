<!-- Adverts -->
<div class="" style="padding: 80px 0; width: 100%;">
  <div class="container">
    <div class="row">
      {{-- @foreach (range(1, 3) as $index) --}}
      @foreach ($items as $item)
      <div class="col-lg-4 advert_col">
        <!-- Advert Item -->
        <div class="advert d-flex flex-row align-items-center justify-content-start" style="cursor: pointer;" onclick="window.location='{{$item->san_pham_url}}';">
          <div class="advert_content" style="">
            <div class="advert_title" style="white-space: nowrap; overflow: hidden; max-width: 100px; text-overflow: ellipsis;"><a href="#">{{ $item->san_pham_ten }}</a></div>
            <div class="advert_text" style="white-space: nowrap; overflow: hidden; max-width: 100px; text-overflow: ellipsis;">{!! $item->san_pham_mo_ta !!}</div>
          </div>
          <div class="ml-auto"><div class="advert_image"><img src="{{ $item->san_pham_hinh_dai_dien }}" alt=""></div></div>
        </div>
      </div>
      @endforeach
      {{-- @endforeach --}}
    </div>
  </div>
</div>
