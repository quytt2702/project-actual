<?php

function select_raw($query)
{
    \Log::info($query);
    return DB::select($query);
}

function insert_raw($query)
{
    \Log::info($query);
    return DB::insert($query);
}

function convert_email($email)
{
    $arr_mail = explode('@', $email);
    return str_replace('.', '', $arr_mail[0]) . '@' .$arr_mail[1];
}

function number_format_vnd($money)
{
    if (!is_numeric($money)) {
        return 0;
    }
    return number_format(intval($money / 1000) * 1000);
}

function return_error($error)
{
    return response()->json([
        'errors' => [
            'message' => [$error],
        ],
    ], '400');
}

function return_message($type, $sub_type, $message, $reload = false, $link = '')
{
    return response()->json([
        'type'      => $type,
        'sub_type'  => $sub_type,
        'message'   => $message,
        'reload'    => $reload,
        'link'      => $link,
    ], 200);
}

function validate_errors($error)
{
    throw \Illuminate\Validation\ValidationException::withMessages($error);
}

function save_image($image)
{
    $file = $image;
    $extension = $file->getClientOriginalExtension();
    $link = 'images/xac_thuc/';
    $name = Uuid::generate(4) . '.' . $extension;
    $file->move($link, $name);

    return '/' . $link . $name;
}

function vn_to_en($str)
{
    $unicode = [
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|á|ạ|à|ả',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ễ|ễ|ẽ|é|ẹ|ẻ',
        'i' => 'í|ì|ỉ|ĩ|ị|ị|ì|í',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ọ|ò|ó|õ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ú|ờ|ù|ụ|ủ',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|ý',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    ];
    foreach ($unicode as $nonUnicode => $uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

function title_to_url($title)
{
    $title = vn_to_en($title);
    $title = str_replace(' ', '-', $title);
    $title = strtolower($title);
    $title = preg_replace('/[^A-Za-z0-9-]/', '', $title);

    return preg_replace('/-+/', '-', $title);
}

function ddd($object)
{
    dd($object->toArray());
}

function convertGioPhutGiay($object)
{
    return (strlen($object) < 2) ? '0'. $object : $object;
}

function secondToTime($totalSeconds)
{
    $hours = floor($totalSeconds / 3600);
    $minutes = floor(($totalSeconds - ($hours * 3600)) / 60);
    $seconds = $totalSeconds - ($hours * 3600) - ($minutes * 60);

    return compact('hours', 'minutes', 'seconds');
}

function tele($message)
{
    $link = 'https://api.telegram.org/bot511977227:AAF8HIcFpJvXymf5K_TJfgH1jZ55PxClruo/sendmessage?chat_id=504027413&text=' . urlencode($message) . '&parse_mode=html';
    $client = new \GuzzleHttp\Client();
    $res = $client->request('GET', $link);
}

if (!function_exists('lastItem')) {
    function lastItem(array $array)
    {
        if (($count = count($array)) === 0) {
            return null;
        }

        return $array[$count - 1];
    }
}

function view_paginate_buttons($object)
{
    if (get_class($object) === 'Illuminate\Pagination\LengthAwarePaginator') {
        return $object->links();
    }
}

function log_system($message, $type = 'i')
{
    $loai = [
        'i' => 'INFO',
        'w' => 'WARNING',
        'e' => 'ERROR',
    ];

    \App\Entities\Log::create([
        'noi_dung' => $message,
        'the_loai' => $loai[$type],
    ]);
}

function kiem_tra_ky_tu($str, $arr)
{
    foreach ($arr as $item) {
        if (strpos($str, $item)) {
            return false;
        }
    }
    return true;
}

function convert_number_to_words($number)
{
    $hyphen = ' ';
    $conjunction = '  ';
    $separator = ' ';
    $negative = 'âm ';
    $decimal = ' phẩy ';
    $dictionary = array(
        0 => 'không',
        1 => 'một',
        2 => 'hai',
        3 => 'ba',
        4 => 'bốn',
        5 => 'năm',
        6 => 'sáu',
        7 => 'bảy',
        8 => 'tám',
        9 => 'chín',
        10 => 'mười',
        11 => 'mười một',
        12 => 'mười hai',
        13 => 'mười ba',
        14 => 'mười bốn',
        15 => 'mười năm',
        16 => 'mười sáu',
        17 => 'mười bảy',
        18 => 'mười tám',
        19 => 'mười chín',
        20 => 'hai mươi',
        30 => 'ba mươi',
        40 => 'bốn mươi',
        50 => 'năm mươi',
        60 => 'sáu mươi',
        70 => 'bảy mươi',
        80 => 'tám mươi',
        90 => 'chín mươi',
        100 => 'trăm',
        1000 => 'ngàn',
        1000000 => 'triệu',
        1000000000 => 'tỷ',
        1000000000000 => 'nghìn tỷ',
        1000000000000000 => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list( $number, $fraction ) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens = ((int)($number / 10)) * 10;
            $units = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int)($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array( );
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function number_to_words($number)
{
    return ucfirst(convert_number_to_words($number));
}
