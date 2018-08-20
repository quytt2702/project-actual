@extends('email.layouts.master')
@section('master.title', config('app.name'))
@section('master.content')
<p>Thông báo hồ sơ tham gia Đại lý online bị từ chối.</p>
<p>Kính gửi: {{ $ho_ten }}.</p>
<p style="text-align: justify;">Cảm ơn bạn đã đăng ký tham gia vào cộng đồng làm việc trực tuyến Lavion.vn, chúng tôi thông báo hồ sơ của bạn gửi tham gia làm Đại lý online trên Lavion.vn không được duyệt thông qua vì lý do: <i style="color: red">"{{ $ly_do }}"</i>.
Bạn hãy click vào <a href="{{ config('app.url') }}cong-tac-vien/xac-thuc">link</a> đây để chỉnh sửa lại hồ sơ của bạn chỉ mất vài giây thôi để bạn được gia nhập cộng đồng của chúng tôi để đưa những sản phẩm chất lượng tới cộng đồng người dùng internet ngay bây giờ!</p>
<p>Xin trân trọng cám ơn.</p>
<div style="margin: auto; display: flex; max-width: 200px;">
  <a href="{{ config('app.url') }}cong-tac-vien/xac-thuc" class="btn btn-red" style="flex: 1; text-align: center; font-size: 18px;">Chỉnh sửa thông tin</a>
</div>
<p></p>
@endsection
