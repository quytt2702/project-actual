<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
      <div class="white-box">
        <h3 class="box-title">Biểu đồ (Đã xác thực/ Đăng ký)</h3>
        <div>
          <canvas id="chart2" height="150"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="form-horizontal">
    <div class="table-responsive" id="pagi">
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Email</th>
            <th>Họ và tên</th>
            <th>Số điện thoại</th>
            <th>Ngày sinh</th>
            <th>Ngày tạo</th>
          </tr>
        </thead>
        <tbody>
          @if (empty($congTacVienView) || count($congTacVienView) === 0)
          <tr>
            <td colspan="7">Không có dữ liệu</td>
          </tr>
          @else
          @php
          $index = 1;
          @endphp
          @foreach ($congTacVienView as $item)
          <tr>
            <td>{{ $index++ }}</td>
            <td class="text-nowrap">{{ $item->email }}</td>
            <td>{{ $item->ho_va_ten }}</td>
            <td>{{ $item->so_dien_thoai }}</td>
            <td class="text-nowrap">{{ date('Y-m-d',strtotime($item->ngay_sinh)) }}</td>
            <td class="text-nowrap">{{ substr($item->created_at, 0, 10) }}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
      {!! view_paginate_buttons($congTacVienView) !!}
    </div>
  </div>
</div>
<script>
$( document ).ready(function() {
  var ctx2 = document.getElementById("chart2").getContext("2d");
  var data2 = {
    labels: JSON.parse("{{ $dataLabel }}".replace(/&quot;/g,'"')),//["January", "February", "March", "April", "May", "June", "July", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI", "HIHI"],
    datasets: [
    {
      label: "Tổng người đăng ký",
      fillColor: "rgba(255,118,118,0.8)",
      strokeColor: "rgba(255,118,118,0.8)",
      highlightFill: "rgba(255,118,118,1)",
      highlightStroke: "rgba(255,118,118,1)",
      data: JSON.parse("{{ $data2 }} ")//[10, 30, 80, 61, 26, 75, 40, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20]
    },
    {
      label: "Tổng người xác thực",
      fillColor: "rgba(180,193,215,0.8)",
      strokeColor: "rgba(180,193,215,0.8)",
      highlightFill: "rgba(180,193,215,1)",
      highlightStroke: "rgba(180,193,215,1)",
      data: JSON.parse("{{ $data1 }} ") //[28, 48, 40, 19, 86, 27, 90, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40, 40]
    }
    ]
  };

  var chart2 = new Chart(ctx2).Bar(data2, {
    scaleBeginAtZero : true,
    scaleShowGridLines : true,
    scaleGridLineColor : "rgba(0,0,0,.005)",
    scaleGridLineWidth : 0,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    barShowStroke : true,
    barStrokeWidth : 0,
    tooltipCornerRadius: 2,
    barDatasetSpacing : 3,
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    responsive: true
  });

});

</script>
