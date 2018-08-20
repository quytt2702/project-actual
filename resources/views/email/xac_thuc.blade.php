@extends('email.layouts.master')
@section('master.title', config('app.name'))
@section('master.content')
<p>Thông báo xác thực tài khoản.</p>
<p>Kính gửi: {{ $congTacVien->ho_va_ten }}.</p>
<p style="text-align: justify;">Bạn hãy click vào <a href="{{ config('app.url') }}cong-tac-vien/xac-thuc/{{$congTacVien->txid}}" style="text-decoration:none;"><b> đây</b></a> để xác thực tài khoản</p>
<p>Xin trân trọng cám ơn.</p>
<div style="margin: auto; display: flex; max-width: 200px;">
  <a href="{{ config('app.url') }}cong-tac-vien/xac-thuc/{{$congTacVien->txid}}" class="btn btn-red" style="flex: 1; text-align: center; font-size: 18px;">Xác thực tài khoản</a>
</div>
<p></p>
@endsection
