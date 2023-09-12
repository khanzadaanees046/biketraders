<!-- @extends('admin.layouts.main') -->
@extends('admin.layouts.app')

@section('css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  
  
</script>

@endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle mb-5">
    <h1>Dashboard</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <!-- Sales Card -->
          <div class="col-md-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Total Sales <span>| All</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi "></i>
                    <img src="{{asset('admin/assets/img/electric-bike (1).png')}}" style="width: 35px;" alt="">
                  </div>
                  <div class="ps-3">
                    <h6>Rs. {{$total_sale}}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-md-4 col-md-4">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Bike Sales <span>| All</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <!-- <i class="bi bi-coin"></i> -->
                  <img src="{{asset('admin/assets/img/man (2).png')}}" style="width: 35px;" alt="">

                  </div>
                  <div class="ps-3">
                    <h6>{{$total_bike_sale}}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-md-4 col-md-4">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Bike Available <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <!-- <i class="bi bi-bicycle"></i> -->
                  <img src="{{asset('admin/assets/img/scooter.png')}}" style="width: 35px;" alt="">

                  </div>
                  <div class="ps-3">
                    <h6>{{$total_bike}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Customers Card -->
          <!-- Orders Card -->
          <div class="col-md-4 col-md-4">

            <div class="card info-card customers-card">


              <div class="card-body">
                <h5 class="card-title">Bike Sale <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bicycle"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$today_sales}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Order Card -->
          <!-- Expense Card -->
          <div class="col-md-4 col-md-4">

            <div class="card info-card  sales-card">


              <div class="card-body">
                <h5 class="card-title">Profit <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-wallet2"></i>
                  </div>
                  <div class="ps-3">
                    <h6>Rs. {{$toal_profit}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- Expense Order Card -->
          <!-- Customers Card -->
          <div class="col-md-4 col-md-4">

            <div class="card info-card revenue-card">


              <div class="card-body">
                <h5 class="card-title">Expense <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-exchange"></i>
                  </div>
                  <div class="ps-3">
                    <h6>Rs. {{$total_expnse}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- End Customers Card -->
          <div class="col-md-6">
            <div class="card p-3" >
              <canvas id="doughnutchart" style="margin: auto; height: 180px;"></canvas>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card p-3">
            <canvas id="myChart" style="height: 360px;"></canvas>

            </div>
          </div>
          <!-- <div class="col-12">
            <div class="card p-3">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>

            </div>
          </div> -->

        </div>
      </div>
    </div><!-- End Left side columns -->

    </div>
  </section>

</main>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.show_truck').hide();
    $('.show_labour').hide();
    $(".vendor_struck").change(function() {
      var x = $(this).val()
      if (x == 'yes') {
        $('.show_truck').show();
      } else {
        $('.show_truck').hide();
      }
    });
    $('.labour_available').change(function() {
      var labour = $(this).val();
      // alert(labour);
      if (labour == 1) {
        $('.show_labour').show();
      } else {
        $('.show_labour').hide();

      }
    });
  });
  
</script>
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($labels) !!},
        datasets: [{
          label: 'Total Bike Sales',
          data: {!! json_encode($data) !!},
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    const dgt = document.getElementById('doughnutchart');
      const data = {
      labels: [
        'Total Bike Add',
        'Total Bike Sale'
      ],
      datasets: [{
        label: 'Overall Bike Purchase and Sale Reports',
        data: [ {{$pidata['totalAdded']}}, {{$pidata['totalSold']}} ],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    };
    new Chart(dgt, {
      type: 'doughnut',
      data: data,
      
    });
</script>

// <script>
// window.onload = function () {

// var chart = new CanvasJS.Chart("chartContainer", {
// 	animationEnabled: true,
// 	title:{
// 		text: "Bike Sale Purchase Reports",
// 		horizontalAlign: "left"
// 	},
// 	data: [{
// 		type: "doughnut",
// 		startAngle: 60,
// 		//innerRadius: 60,
// 		indexLabelFontSize: 17,
// 		indexLabel: "{label} - #percent%",
// 		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
// 		dataPoints: [
// 			{ y: {{$pidata['totalAdded']}}, label: "Bike Purchase" },
// 			{ y: {{$pidata['totalSold']}}, label: "Bike Sale" },
// 		]
// 	}]
// });
// chart.render();

// }
// </script>
// <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection