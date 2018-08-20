<!-- ***** Footer Area Start ***** -->
<style>
  .footer_p {
    line-height: 25px;
    margin-bottom: 20px;
  }
</style>
<footer class="footer-social-icon text-center section_padding_70 clearfix">
  @if (!empty($footer->content))
    <!-- Foooter Text-->
    <div class="copyright-text">
      <p class="footer_p">{!! $footer->content !!}</p>
    </div>
    @if (!empty($partnerInfo))
      <p class="text-center footer_p">{{ $partnerInfo or '' }}</p>
    @endif
    @if (!empty($congTacVien))
      <p class="text-center footer_p">
        <span>Link partner chia sẻ bởi: </span>
        <span>{{ $congTacVien->ho_va_ten }} | {{ $congTacVien->sdt }} | {{ $congTacVien->email }}</span>
      </p>
    @endif
  @endif
</footer>
<!-- ***** Footer Area Start ***** -->
