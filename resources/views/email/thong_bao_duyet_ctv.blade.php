@extends('email.layouts.master')
@section('master.title', config('app.name'))
@section('master.content')
<p>Thông báo hồ sơ tham gia Đại lý online đã được duyệt.</p>
<p>Kính gửi: {{ $ho_ten }}.</p>
<p style="text-align: justify;">Cảm ơn bạn đã đăng ký tham gia vào cộng đồng làm việc trực tuyến {{ config('app.name') }}, chúng tôi vui mừng thông báo hồ sơ của bạn gửi tham gia làm Đại lý online trên {{ config('app.name') }} đã được duyệt thông qua. Bạn hãy bắt đầu cùng chúng tôi đưa những sản phẩm chất lượng tới cộng đồng người dùng internet ngay bây giờ!</p>
<p>Xin trân trọng cám ơn.</p>
@endsection
