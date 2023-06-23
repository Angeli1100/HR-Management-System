@extends('backend.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header info">
        <h3 class="card-title">Leave</h3>
      </div>
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div id="piechart1" style="width: 400px; height: 300px;"></div>
            </div>
            <div class="col-md-6">
              <div id="piechart2" style="width: 400px; height: 300px;"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div id="piechart3" style="width: 400px; height: 300px;"></div>
            </div>
            <div class="col-md-6">
              <div id="piechart4" style="width: 400px; height: 300px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      var annualLeaveData = parseInt("{{ $annualLeaveData }}");
      var emergencyLeaveData = parseInt("{{ $emergencyLeaveData }}");
      var hospitalityLeaveData = parseInt("{{ $hospitalityLeaveData }}");
      var paidLeaveData = parseInt("{{ $paidLeaveData }}");

      var annualLeaveQuota = parseInt("{{ $annualLeaveQuota }}");
      var emergencyLeaveQuota = parseInt("{{ $emergencyLeaveQuota }}");
      var hospitalityLeaveQuota = parseInt("{{ $hospitalityLeaveQuota }}");
      var paidLeaveQuota = parseInt("{{ $paidLeaveQuota }}");

      var data1 = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Annual Leave', annualLeaveData],
        ['Quota', annualLeaveQuota]
      ]);

      var data2 = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Emergency Leave', emergencyLeaveData],
        ['Quota', emergencyLeaveQuota]
      ]);

      var data3 = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Hospitality Leave', hospitalityLeaveData],
        ['Quota', hospitalityLeaveQuota]
      ]);

      var data4 = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Paid Leave', paidLeaveData],
        ['Quota', paidLeaveQuota]
      ]);

      var options = {
        title: 'Leave Distribution',
        colors: ['red', 'blue'],
        pieSliceText: 'value',
        legend: 'right'
      };

      var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
      chart1.draw(data1, options);

      var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
      chart2.draw(data2, options);

      var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
      chart3.draw(data3, options);

      var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));
      chart4.draw(data4, options);
    }
  </script>
@endsection
