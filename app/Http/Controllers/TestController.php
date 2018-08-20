<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Jobs\SendMail;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $ho_ten = 'aasfa';

        SendMail::send('tranvthanhson@gmail.com', 'Đơn hàng', view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
        return view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'));

        \Log::info('This is info log');
        return number_to_words(20000);
        return 'ahihi';
        $pdf = \App::make('dompdf.wrapper');
        // body {
        //     font-family: 'DejaVu Sans' !important;
        // }
        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $ho_ten = 'ABC';
        // view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'));
        // $html = mb_convert_encoding(, 'HTML-ENTITIES', 'UTF-8');
        $pdf->loadHTML(view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'))->render());
        return $pdf->stream();
        //
        $ho_ten = 'ABC';
        return view('email.thong_bao_khi_duoc_thuong_tien_vao_tai_khoan_ctv', compact('ho_ten'));

        $ho_ten = 'ABC';
        $ly_do = 'Không thích';

        return view('email.thong_bao_khong_duyet_ctv', compact('ho_ten', 'ly_do'));

        return ;
        $ho_ten = 'ABC';
        return view('email.thong_bao_duyet_ctv', compact('ho_ten'));


        return ;
        $info = DB::table('hoa_don_ban_hang')
            ->where('hoa_don_ban_hang.id', 1)
            ->join('khach_hang', 'khach_hang.email', 'hoa_don_ban_hang.email_khach_hang_mua')
            ->select('hoa_don_ban_hang.*', 'khach_hang.*', 'hoa_don_ban_hang.created_at as ngay_tao')
            ->first();

        $ngayGiaoHangDuKien = Carbon::parse($info->ngay_tao)->addDays(7);
        $ngayGiaoHangDuKien = substr($ngayGiaoHangDuKien, 0, 10);


        $chiTietDonHang = DB::table('chi_tiet_hoa_don_ban_san_pham')
            ->where('chi_tiet_hoa_don_ban_san_pham.id_hoa_don_ban_hang', $info->id)
            ->join('san_pham', 'san_pham.id', 'chi_tiet_hoa_don_ban_san_pham.id_san_pham')
            ->get();

        $caiDatChung = DB::table('cai_dat_chung')
            ->first();

        return view('email.don_hang', compact('info', 'chiTietDonHang', 'caiDatChung', 'ngayGiaoHangDuKien'));

        SendMail::send('tranvthanhson@gmail.com', 'Đơn hàng', view('email.don_hang', compact('info', 'chiTietDonHang'))->render());

        return view('email.don_hang', compact('info', 'chiTietDonHang'));
    }

    public function post(Request $request)
    {
    }
}
