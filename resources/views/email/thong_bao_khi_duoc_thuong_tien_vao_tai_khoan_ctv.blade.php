@extends('email.layouts.master')
@section('master.title', config('app.name'))
@section('master.content')
<p>Bạn vừa được thưởng tiền trên Lavion.</p>
<p>Kính gửi: {{ $ho_ten }}.</p>
<p style="text-align: justify;">Những nỗ lực không mệt mỏi của bạn đã được đền đáp xứng đáp với {{ config('app.name') }}, chúng tôi vui mừng thông báo tài khoản của bạn vừa được thưởng thêm tiền. Bạn hãy truy cập và <a href="{{ config('app.url') }}cong-tac-vien/lich-su-giao-dich">kiểm tra</a> ngay bây giờ!</p>
<p>Xin trân trọng cám ơn.</p>
<div style="margin: auto; display: flex; max-width: 200px;">
  <a href="{{ config('app.url') }}cong-tac-vien/lich-su-giao-dich" class="btn btn-red" style="flex: 1; text-align: center; font-size: 18px;">Kiểm tra thu nhập</a>
</div>
<p></p>
@endsection
