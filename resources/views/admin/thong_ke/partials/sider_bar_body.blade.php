<tr>
  <td class="text-center">
    <a class="valueThangNam" href="javascript:" date='{{ $nam }}-{{ $thang }}'>
      {{ $nam }}-{{strlen($thang) < 2 ? "0$thang" : $thang}} ({{ $sidebar->count() }})
    </a>
  </td>
</tr>
