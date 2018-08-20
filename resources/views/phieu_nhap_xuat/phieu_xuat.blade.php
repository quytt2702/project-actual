<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style>
  body {
    font-family: 'DejaVu Sans' !important;
    margin: 0;
    overflow-x: hidden;
    color: #313131;
    font-weight: 300;
  }
  p {
    font-size: 11px;
  }

  .title {
    font-size: 30px;
    text-align: center;
    margin: 0 0 20px 0;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }
  td {
    padding: 8px;
  }
  th {
    border: 1px solid;
    padding: 8px;
    font-size: 11px;
    width: auto;
  }
  .none-right {
    text-align: right;
    border-right: none;
  }

  td {
    border: 1px solid;
    font-size: 11px;
    width: auto;
  }
  .so-tien {
    font-size: 11px;
  }
</style>
</head>
<body>
  <div class="custom-container" style="width: 900px; height: auto; margin: 50px auto;">
    <strong>CÔNG TY CỔ PHẦN LÀM VIỆC TRỰC TUYẾN LAVION</strong>
    <p>Address: 391 Nguyễn Xiển, P. Kim Giang, Q. Thanh Xuân, TP. Hà Nội</p>
    <p>Hotline: 09 8383 6969 / Email: mixmilk.vn@gmail.com/ www.mixmilk.vn </p>
    <br>
    <h1 class="title">PHIẾU XUẤT HÀNG</h1>
    <table>
      <thead>
        <tr>
          <th style="border: none;"></th>
          <th style="border: none;" colspan="5">Khách hàng: {{ $info['hoa_don_ban_hang']->ho_ten}}</th>
          <th style="border: none;" colspan="2">Số phiếu: {{$info['hoa_don_ban_hang']->hash}}</th>
        </tr>
      </thead>
    </table>
    <table class="table-xuat-hang">
      <thead>
        <tr>
          <th style="text-align: center;">STT</th>
          <th style="text-align: center;">Mã Mặt Hàng</th>
          <th style="text-align: center;">Tên mặt hàng</th>
          <th style="text-align: center;">ÐVT</th>
          <th style="text-align: center;">SL</th>
          <th style="text-align: center;">Đơn Giá</th>
          <th style="text-align: center;">Thành Tiền</th>
          <th style="text-align: center;">Ghi Chú</th>
        </tr>
      </thead>
      <tbody>
        @php
          $index = 1;
          $tong_cong = 0;
        @endphp
        @foreach($info['chi_tiet_hoa_don'] as $item)
        <tr>
          <td style="text-align: center">{{$index++}}</td>
          <td>{{$item->san_pham_ma}}</td>
          <td style="width: 250px">{{$item->san_pham_ten}}</td>
          <td style="text-align: center">VND</td>
          <td style="text-align: right">{{ $item->so_luong }}</td>
          <td style="text-align: right">{{ number_format($item->don_gia) }}</td>
          <td style="text-align: right">{{ number_format($item->tong_tien_vnd) }}</td>
          {{$tong_cong+=$item->tong_tien_vnd}}
          <td></td>
        </tr>
        @endforeach
        <tr>
          <td colspan="6" style="border-right: none" >Cộng:</td>
          <td style="border-left: none; text-align: right;">{{number_format($tong_cong)}} đ</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    @php
      $date = $info['hoa_don_ban_hang']->created_at;
    @endphp
    <p class="so-tien"><i>Số tiền viết bằng chữ: <span>{{number_to_words($tong_cong)}}</span> đồng</i></p>
    <p class="so-tien" style="text-align: right"><i>Ngày {{ $date->format('d') }} tháng {{ $date->format('m') }} năm {{ $date->format('Y') }}</i></p>
    <table>
      <thead>
        <tr>
          <th style="border: none; text-align: center; padding: 0;">Thủ trưởng đơn vị</th>
          <th style="border: none; text-align: center; padding: 0;">Người lập phiếu</th>
          <th style="border: none; text-align: center; padding: 0;">Người giao hàng</th>
          <th style="border: none; text-align: center; padding: 0;">Thủ kho</th>
          <th style="border: none; text-align: center; padding: 0;">Kế toán trưởng</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="border: none; text-align: center; padding: 0;">(Ký, họ tên)</td>
          <td style="border: none; text-align: center; padding: 0;">(Ký, họ tên)</td>
          <td style="border: none; text-align: center; padding: 0;">(Ký, họ tên)</td>
          <td style="border: none; text-align: center; padding: 0;">(Ký, họ tên)</td>
          <td style="border: none; text-align: center; padding: 0;">(Ký, họ tên)</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
