@extends('email.layouts.master')
@section('master.title', 'Báo cáo đăng nhập')
@section('master.content')
<p style="width: 100%; display: block;">{{ config('app.name') }} xin thông báo</p>
<p style="padding: 8px 0;">Bạn vừa mới đăng nhập hệ thống.</p>
<p>Xin trân trọng cám ơn.</p>
@endsection
