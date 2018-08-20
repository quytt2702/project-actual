@extends('admin.layouts.master')
@section('master.bodyclass', 'admin-cai-dat-ngon-ngu')
@section('master.title', 'Quản lý cài đặt ngôn ngữ')
@section('master.content')
<div class="row m-t-30">
  <div class="col-md-12">
    <div class="white-box">
      <h3 class="box-title m-b-0">Cài đặt ngôn ngữ</h3>
      <p class="text-muted m-b-30 font-13">Cài đặt thông số cho từng ngôn ngữ</p>
      <div class="row">
        <div class="col-xs-12">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs m-b-15" role="tablist">
            @php
              $index = 1;
            @endphp
            @foreach ($ngonNgu as $item)
            @if($index === 1)
              <input type="hidden" id="idNgonNgu" value="{{$item->id}}">
            @endif
            <li role="presentation" class="{{ ($index++ === 1) ? 'active':''}}"><a class="lang" value="{{ $item->id }}" href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">{{ $item->ten }}</span></a></li>
            @endforeach
          </ul>
          <!-- Tab panes -->
        </div>
        <div id="cai-dat-ngon-ngu-body" class="block">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
