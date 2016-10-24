@extends('admin.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card card-outline-secondary text-xs-center">
        <div class="card-header">Total Pendaftar</div>
        <div class="card-block">
          <h2>{{ $stats['registered'] }}</h2>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card card-outline-secondary text-xs-center">
        <div class="card-header">Grafik Status</div>
        <div class="card-block">
            <canvas id="status-chart" height="200"></canvas>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card card-outline-secondary text-xs-center">
        <div class="card-header">Grafik Divisi</div>
        <div class="card-block">
          <canvas id="divisions-chart" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    var statusChart = new Chart($('#status-chart'), {
      type: 'pie',
      data: {
        labels: ['Lunas', 'Belum bayar'],
        datasets: [
          {
            data: [{{$stats['paid']}}, {{$stats['unpaid']}}],
            backgroundColor: ["#36A2EB", "#FF6384"],
            hoverBackgroundColor: ["#36A2EB", "#FF6384"]
          }
        ]
      }
    });

    var divisionsChart = new Chart($('#divisions-chart'), {
      type: 'bar',
      data: {
        labels: ['Web', 'Desktop', 'Hardsoft', 'Network'],
        datasets: [
          {
            data: [{{$stats['divisions']['web']}}, {{$stats['divisions']['desktop']}}, {{$stats['divisions']['hardware']}}, {{$stats['divisions']['network']}}],
            backgroundColor: [
              'rgba(255, 99, 132, 0.8)',
              'rgba(75, 192, 192, 0.8)',
              'rgba(153, 102, 255, 0.8)',
              'rgba(255, 159, 64, 0.8)'
            ],
            hoverBackgroundColor: [
              'rgba(255,99,132,1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ]
          }
        ]
      },
      options: {
        legend: {
          display: false
        }
      }
    });
  } );
</script>
@endpush
