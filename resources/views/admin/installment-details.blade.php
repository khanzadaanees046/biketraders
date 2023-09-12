@extends('admin.layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<style>
  .toast-success {
    background-color: #2e844a !important;
  }

  /* Set the text color of success messages to white */
  .toast-success .toast-message {
    color: white !important;
  }
  .dashboard .form-control:focus {
    box-shadow: none !important;

  }
</style>
@endsection
@section('content')

<main id="main" class="main">

  <div class="pagetitle mb-5">
    <h1>Payment Details</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Payments</h5>
                <a href="{{url('complete_installment', $payments->id)}}" onclick="complete(event)" class="btn btn-success my-3">Complete</a>
              </div>
                <h6><b>Buyer Name : </b> {{$payments->sale->name}}</h6>
                <h6><b>Father Name : </b> {{$payments->sale->father_name}}</h6>
                <h6><b>Bike : </b> {{$payments->sale->bike->bike_name}}</h6>
                <h6><b>Model : </b> {{$payments->sale->bike->model}}</h6>
                <h6><b>Engine No : </b> {{$payments->sale->bike->engine_no}}</h6>
                <h6><b>Chassis No : </b> {{$payments->sale->bike->chassis_no}}</h6>
                <h6><b>Issue Date : </b> {{$payments->created_at->format('Y-m-d')}}</h6>
                <h6><b>Total Price : </b> Rs. {{$payments->total_price}}</h6>
                @if($payments->status == 1)
                <h6><b>Status : </b><span class="badge bg-success">Paid</span></h6>
                @else
                <h6><b>Status : </b><span class="badge bg-primary">Pending</span></h6>
                @endif
              <!-- Default Table -->
              <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Installments</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($installments as $key => $installment)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>Installment {{$installment->installment_count}}</td>
                        <td>{{ \Carbon\Carbon::parse($installment->paid_date)->format('Y-m-d') }}</td>
                        @if($installment->status == 1)
                        <td><span class="badge bg-success">Paid</span></td>
                        @else
                        <td><span class="badge bg-secondary">Unpaid</span></td>
                        @endif
                        @if($installment->status == 1)
                        <td><span class="ms-4"><i class="bi bi-check-circle-fill"></i></span></td>
                        @else
                        <td><a href="{{url('paid_installment', ['id1' => $installment->id, 'id2' => $payments->id])}}"> <span class="badge bg-primary">complete</span></a></td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4"><strong>No Installment</strong></td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
      <!-- End Left side columns -->

    </div>

    </section>

</main><!-- End #main -->

@endsection
@section('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
  // ------
  @if(Session::has('message'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.success("{{ session('message') }}");
  @endif
  @if(Session::has('error'))
  toastr.options = {
    "closeButton": true,
    "progressBar": true
  }
  toastr.error("{{ session('error') }}");
  @endif
  @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to unpaid this installment",
            text: "You should paid again",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    };
      function addconfirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to paid this installment",
            text: "You will be able to revert this!",
            icon: "info",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    };
      function complete(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to Complete the installments",
            text: "You will not be able to revert this!",
            icon: "info",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {    
                window.location.href = urlToRedirect;               
            }  
        });   
    };
      function confirmdelete(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to delete the installments",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {    
                window.location.href = urlToRedirect;               
            }  
        });   
    };
    
</script>
@endsection