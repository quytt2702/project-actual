<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ mix('bundled/app.css') }}">
</head>
<body>
    <div class="custom-container">
        <strong>CÔNG TY CỔ PHẦN LÀM VIỆC TRỰC TUYỂN LAVION</strong>
        <p class="address">Adress: 391 Nguyễn Xiển, P. Kim Giang, Q. Thanh Xuân, TP. Hà Nội</p>
        <p>Hotline: 09 8383 6969 / Email: mixmilk.vn@gmail.com/ www.mixmilk.vn </p>
        <br>
        <h1 class="title">PHIẾU XUẤT HÀNG</h1>
        <div class="flex-custom">
            <p class="khach">Khách hàng: <span></span></p>
            <p class="phieu">Số phiếu: <span></span></p>
        </div>

        <table class="table-xuat-hang">
            <thead>
                <th>STT</th>
                <th>Mã Mặt Hàng</th>
                <th>Tên mặt hàng</th>
                <th>ÐVT</th>
                <th>SL</th>
                <th>Ðon Giá</th>
                <th>Thành Tiền</th>
                <th>Ghi Chú</th>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center">1</td>
                    <td>MH234234234</td>
                    <td style="width: 250px">mat hang 123</td>
                    <td style="text-align: center">VND</td>
                    <td style="text-align: right">5</td>
                    <td style="text-align: right">200000</td>
                    <td style="text-align: right">5000000</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4" class="none-right" >Cộng:</td>
                    <td colspan="3" class="none-border">0 đ</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <p class='so-tien'>Số tiền viết bằng chữ: <span></span> đồng</p>
        <p class='so-tien' style="text-align: right">Ngày......tháng......năm 20....</p>
        <table>
            <thead>
                <th>Thủ trưởng đơn vị</th>
                <th>Người lập phiếu</th>
                <th>Người giao hàng</th>
                <th>Thủ kho</th>
                <th>Kế toán trưởng</th>
            </thead>
            <tbody style="text-align: center; margin-top: 30px;">
                <td>(Ký, họ tên)</td>
                <td>(Ký, họ tên)</td>
                <td>(Ký, họ tên)</td>
                <td>(Ký, họ tên)</td>
                <td>(Ký, họ tên)</td>
            </tbody>
        </table>
    </div>
</body>
</html>
