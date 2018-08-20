<html>
  <head>
    <style></style>
    <link type="text/css" rel="stylesheet" href="chrome-extension://pioclpoplcdbaefihamjohnefbikjilc/content.css">
  </head>
  <body style="margin-bottom: 8px;">
    <div marginheight="0" marginwidth="0" style="margin:0px;padding:15px 10px;color:rgb(41,41,41);font-family:Helvetica,Arial,sans-serif">
      <span class="pre-header" style="display:none!important">Kính chào quý khách {{ $info->ho_ten }}, chúng tôi vừa nhận được đơn hàng #{{ $info->hash }} của quý khách đặt ngày {{ substr($info->ngay_tao, 0, 10) }} với hình thức thanh toán là Cash on Delivery (COD).</span>
      <table border="0" cellpadding="0" cellspacing="0" height="100%" style="border-spacing:0;border-collapse:collapse;font-size:14px" width="100%">
        <tbody>
          <tr>
            <td align="center" style="border-collapse:collapse" valign="top">
              <table border="0" cellpadding="0" cellspacing="0" class="container" style="border-spacing:0;border-collapse:collapse;font-size:14px;max-width:600px" width="600">
                <tbody>
                  <tr id="header">
                    <td class="logo" style="border-collapse:collapse">
                      <table border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;border-collapse:collapse;font-size:14px;border-bottom:1px solid #dee2e3;width:100%!important" width="100%">
                        <tbody>
                          <tr>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr id="main">
                    <td style="border-collapse:collapse">
                      <table align="left" border="0" cellpadding="0" cellspacing="0" id="main-content" style="border-spacing:0;border-collapse:collapse;font-size:14px">
                        <tbody>
                          <tr>
                            <td style="border-collapse:collapse" valign="top">
                              <h1 style="font-size:14px;color:#4c4848">
                              </h1>
                              <a href="http://www.lazada.vn/sinh-nhat-lazada/" title="" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.lazada.vn/sinh-nhat-lazada/&amp;source=gmail&amp;ust=1532240072847000&amp;usg=AFQjCNFWoVMtzoozb_NFeE2PkAiSu1H-6Q"><img alt="" src="https://ci6.googleusercontent.com/proxy/tCyYAlEQKZNs_iieiKlbB_e6ueyK48wkBC_x1-EfQOI40ZLIvEk4okG1THfpGTg71vX9pRg2rbxUJY__wluhTMQ4G3UUhk4marthpgrY8JpeuBqQpzNV9TbsSSabQaBtY-CM01v78qZF=s0-d-e1-ft#http://vn-live.slatic.net/cms/2017/LZD-Birthday/Email-Banner-Confirmation-Mar07.jpg" class="CToWUd"></a>
                              <div class="mtl" style="margin-top:20px"><strong class="txt-big" style="font-size:16px">Kính chào quý khách {{ $info->ho_ten }},</strong>
                              </div>
                              <div class="mtm" mbl"="" style="margin:10px 0px">Chúng tôi vừa nhận được <strong class="color-orange" style="color:#f36f21">đơn hàng #{{ $info->hash }} </strong> của quý khách đặt ngày <strong>{{ substr($info->ngay_tao, 0, 10) }} </strong> với hình thức thanh toán là <strong>Cash on Delivery (COD)</strong>. Chúng tôi sẽ gửi thông báo đến quý khách qua một email khác ngay khi sản phẩm được giao cho đơn vị vận chuyển.
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td align="center" class="bg-grey" border-top-dark-grey"="" style="border-collapse:collapse;background-color:#f2f4f6;border-top:2px solid #646464" width="100%">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" class="col1of2" style="border-spacing:0;border-collapse:collapse;font-size:14px" width="48%">
                                <tbody>
                                  <tr>
                                    <td align="left" class="order-col" pam"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px" valign="top">
                                      <div class="order-status-inner">
                                        <div class="color-grey" style="color:#646464">Thời gian giao hàng dự kiến:
                                        </div>
                                        <div class="pts" style="margin-top:5px;margin-bottom:10px"><strong>Kiện hàng # 1</strong>: {{ $ngayGiaoHangDuKien }}
                                        </div>
                                        <div class="pts" style="margin-top:5px;margin-bottom:10px"><strong>Kiện hàng # 2</strong>: {{ $ngayGiaoHangDuKien }}
                                        </div>
                                        <table cellpadding="10" style="width:100%!important" width="100%">
                                          <tbody>
                                            <tr>
                                              {{-- <td align="center" style="background-color:#f36f21;text-align:center;width:100%!important" valign="middle"></td> --}}
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <table align="left" border="0" cellpadding="0" cellspacing="0" class="col1of2" style="border-spacing:0;border-collapse:collapse;font-size:14px" width="48%">
                                <tbody>
                                  <tr>
                                    <td class="order-col" pam"txt-left"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;text-align:left" valign="top">
                                      <div class="order-status-inner">
                                        <div class="color-grey" style="color:#646464">Đơn hàng sẽ được giao đến:
                                        </div>
                                        <div class="mts" style="margin-top:5px"><strong class="color-orange" style="color:#f36f21">{{ $info->ho_ten }} </strong>
                                        </div>
                                        <div class="mts" style="margin-top:5px"><strong><a href="#" target="_blank">{{ $info->dia_chi_nhan_hang }}</a><br> Phone: {{ $info->sdt }} </strong>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td align="left" style="border-collapse:collapse;padding:0">
                              <div style="margin-top:20px;margin-bottom:10px;margin-right:10px"><strong>Sau đây là thông tin chi tiết về đơn hàng:</strong>
                              </div>
                            </td>
                          </tr>

                          @php
                            $index = 1;
                            $tongTien = 0;
                          @endphp

                          @foreach ($chiTietDonHang as $item)
                          @php
                            $tongTien += $item->so_luong * $item->san_pham_gia_ban_thuc_te;
                          @endphp
                          <tr>
                            <td align="left" class="border-dashed-grey" bg-orange"="" style="border-collapse:collapse;background-color:#fff8e7;border:1px dashed #e7ebed;padding:0">
                              <div style="margin-top:10px;margin-bottom:10px;margin-left:10px;margin-right:10px">
                                <div class="mbs" style="margin-bottom:5px"><strong class="txt-upper" style="text-transform:uppercase">KIỆN HÀNG # {{ $index++ }} </strong><span></span>
                                </div>
                                <div><strong style="display:inline-block;margin-right:5px">{{ substr($info->ngay_tao, 0, 10) }} </strong><span style="display:inline-block;min-width:150px">với hình thức giao hàng Standard</span>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse;border:1px dashed #e7ebed;border-bottom:none">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" class="order-detail" style="border-spacing:0;border-collapse:collapse;font-size:14px" width="100%">
                                <tbody>
                                  <tr>
                                    <td class="col-thumb" ptm"pbm"="" height="120" style="border-collapse:collapse;padding: 10px 0 10px 15px;" valign="top"><a href="{{ config('app.url') }}{{ $item->san_pham_hinh_dai_dien }}" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.lazada.vn/routes/?action%3DproductInfo%26sku%3DOE680ELAA3QTUSVNAMZ-6671679%26utm_source%3DOrderconfirmation%26utm_medium%3DEmail%26utm_campaign%3DLineItem&amp;source=gmail&amp;ust=1532240072847000&amp;usg=AFQjCNEOEeVNQ4gmVcMRqXFox2nVJh86kg"><img src="{{ config('app.url') }}{{ $item->san_pham_hinh_dai_dien }}" style="width:120px" class="CToWUd"> </a></td>
                                    <td class="col-info" pam"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px" valign="top">
                                      <div class="mbs" style="margin-bottom:5px"><a class="txt-decoration-none" href="#">{{ $item->san_pham_ten }}</a>
                                      </div>
                                      <div class="mbs" color-grey"="" style="margin-bottom:5px;color:#646464">Số lượng: {{ $item->so_luong }}
                                      </div>
                                    </td>
                                    <td align="right" class="col-price" ptm"prm"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px" valign="top"><strong>{{ number_format($item->san_pham_gia_ban_thuc_te) }} VND</strong></td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          @endforeach

                          <tr>
                            <td style="border-collapse:collapse;border:1px dashed #e7ebed">
                              <div class="order-total">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;border-collapse:collapse;font-size:14px;width:100%!important" width="100%">
                                  <tbody>
                                    <tr>
                                      <td align="right" class="col-title" ptm"prm"color-grey"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;color:#646464;width:80%" valign="top">Thành tiền:</td>
                                      <td align="right" class="col-price" ptm"prm"color-grey"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;color:#292929;min-width:140px" valign="top">{{ number_format($tongTien) }} VND</td>
                                    </tr>
                                    <tr>
                                      <td align="right" class="col-title" pts"prm"color-grey"="" style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#646464;width:80%" valign="top">Phí giao hàng:</td>
                                      <td align="right" class="col-price" pts"prm"color-grey"="" style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#292929;min-width:140px" valign="top">{{ number_format($caiDatChung->phi_ship_cod) }} VND</td>
                                    </tr>
                                  {{--   <tr>
                                      <td align="right" class="col-title" pts"prm"color-grey"="" style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#646464;width:80%" valign="top">Giảm giá (Voucher):</td>
                                      <td align="right" class="col-price" pts"prm"color-grey"="" style="border-collapse:collapse;padding-top:5px;padding-right:10px;color:#292929;min-width:140px" valign="top">0.00 VND</td>
                                    </tr> --}}
                                    <tr>
                                      <td align="right" class="col-title" ptm"prm"col-title"txt-big"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;font-size:16px;width:80%" valign="top"><strong>Tổng cộng:</strong></td>
                                      <td align="right" class="col-price" ptm"prm"color-grey"txt-big"="" style="border-collapse:collapse;padding-top:10px;padding-right:10px;font-size:16px;color:#646464;min-width:140px" valign="top"><strong class="color-orange" style="color:#f36f21">{{ number_format($tongTien + $caiDatChung->phi_ship_cod) }} VND</strong></td>
                                    </tr>
                                    <tr>
                                      <td align="right" class="col-title" style="border-collapse:collapse;width:80%" valign="top"></td>
                                      <td align="right" class="col-price" pts"prm"pbm"color-grey"txt-small"="" style="border-collapse:collapse;padding-top:5px;padding-right:10px;padding-bottom:10px;font-size:13px;color:#646464;min-width:140px" valign="top"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td align="left" style="border-collapse:collapse;padding:0">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;border-collapse:collapse;font-size:14px">
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td align="left" style="border-collapse:collapse;padding:0;border-top:1px dashed #e7ebed;border-bottom:2px solid #f36f21">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" style="border-spacing:0;border-collapse:collapse;font-size:14px" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse" valign="bottom">
                                      <div style="margin-top:20px;margin-bottom:15px">
                                        <div><strong>Quý khách cần hỗ trợ thêm?</strong>
                                        </div>
                                        <div style="margin-top:5px">Nếu có bất cứ thắc mắc nào, mời quý khách tham khảo trang <a class="txt-decoration-none" color-blue"="" href="http://www.lazada.vn/routes/?action=static&amp;queryParam=helpcenter&amp;utm_source=Orderconfirmation&amp;utm_medium=Email&amp;utm_campaign=FAQ" style="text-decoration:none;color:#199cb7" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.lazada.vn/routes/?action%3Dstatic%26queryParam%3Dhelpcenter%26utm_source%3DOrderconfirmation%26utm_medium%3DEmail%26utm_campaign%3DFAQ&amp;source=gmail&amp;ust=1532240072848000&amp;usg=AFQjCNEg5WKRo3IlgZY-q7OJEVaYWPYkBQ">Trung tâm hỗ trợ</a>. Để liên hệ với chúng tôi, quý khách vui lòng để lại tin nhắn tại trang <a class="txt-decoration-none" color-blue"="" href="http://www.lazada.vn/routes/?action=static&amp;queryParam=contact&amp;utm_source=Orderconfirmation&amp;utm_medium=Email&amp;utm_campaign=Contract" style="text-decoration:none;color:#199cb7" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.lazada.vn/routes/?action%3Dstatic%26queryParam%3Dcontact%26utm_source%3DOrderconfirmation%26utm_medium%3DEmail%26utm_campaign%3DContract&amp;source=gmail&amp;ust=1532240072848000&amp;usg=AFQjCNEEe7reymqALXxg-uU_Ux0RLU5vsQ">Liên hệ</a>.
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      <span class="HOEnZb"><font color="#888888">
      </font></span><span class="HOEnZb"><font color="#888888">
      </font></span>
      <table cellpadding="0" cellspacing="0" style="border:0px;padding:0px;margin:0px;display:none;float:left">
        <tbody>
          <tr>
            <td height="1" style="font-size:1px;line-height:1px;padding:0px">
              <br><img height="1" width="1" src="https://ci6.googleusercontent.com/proxy/5OJ02_HgFIpxX2bn42U6PxAqJ_MdEBe9Mt2mX3liGMx80DAAeRh_3X2iLTBNxcbCCg_E0E_ynAx51TUGkceq1jFVDnjzAKJHSCiiYQSb8l2kPbpZIYBiHcnvPrHxxVs3iaCM0I_SNpZSQ0gRcdfZU9_cIqZz4p7MX-qwCp-DwK18y-_GKeKdEw5aM6aWkn9mDRJCbZvkMZmM_EhqvEsicfPjKVNMKH0soqUwnln44AeGiCZoFxeJVOEQ6cirCvhzH8oZipcpB9MULHZj6Wn48rKOcQQl8vHt-jbIN0-vWLOrGO2Bm75qDaYAB14uJ0xly7yybrM=s0-d-e1-ft#https://email.lazada.com/pub/as?_ri_=X0Gzc2X%3DYQpglLjHJlYQGkzdIuusmbzacYWMzcDNwjzbza9uzcpzezcYOe8zgzcIfBAeWWcb3gDqrMiezfi8ObOVXHkMX%3Dw&amp;_ei_=EolaGGF4SNMvxFF7KucKuWMcscZNyhrSBFVM0kQ2PW958C55a8yG1559nrzo1eVpXMmH_TrekWX5Ewo." class="CToWUd">
              <br><img border="0" width="1" height="1" src="https://ci3.googleusercontent.com/proxy/YW1stdP5TePF4nANGFnQk4yM50AM3d8RwL7dWZo22x4ODg5UAVaKMpmrb20PpXxv4r1fkFgQYGD9pUaAHRNjUnOzbjbLMppAEN8nHpwY6Npk-NI8wzP-0MOO9gMHeXkFaqXfkgHFV1s9JTBGmRHPG8kGBZIyqWPz4Ww0kGP7RzQhLbpyQXNO44k550ylVM7gTy3wCJScE6fSW_S7FxCQ4xq1G2q-xs0YOuiL=s0-d-e1-ft#https://ib.adnxs.com/getuid?https://a.adrsp.net/dsp/ci/2/EaKkzFk_mLwD46fFldebJOVfurf7Q069MOW554THui0p_kFQf2QSW2hVoWfc5TihlO6wFiuBP7fd3tBqoTdX/%24UID" class="CToWUd"><span class="HOEnZb"><font color="#888888">
              </font></span>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="yj6qo ajU">
        <div id=":kx" class="ajR" role="button" tabindex="0" data-tooltip="Hiển thị nội dung được rút gọn" aria-label="Hiển thị nội dung được rút gọn"><img class="ajT" src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif"></div>
      </div>
      <span class="HOEnZb adL"><font color="#888888">
      </font></span>
    </div>
  </body>
</html>
