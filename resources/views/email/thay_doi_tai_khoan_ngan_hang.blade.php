@extends('email.layouts.master')
@section('master.title', 'Thông báo về tài khoản ngân hàng')
@section('master.content')
<p>{{ config('app.name') }} xin thông báo</p>
<p style="padding: 8px 0;">Bạn vừa mới thay đổi tài khoản ngân hàng</p>
<div style="margin: auto; display: flex; max-width: 400px;">
  <a href="{{$info['link']}}/deny" class="btn btn-danger" style="flex: 1; margin-right: 5px;">Không đồng ý</a>
  <a href="{{$info['link']}}/accept" class="btn btn-success" style="flex: 1; margin-left: 5px;">Đồng ý</a>
</div>
<p></p>
@endsection
