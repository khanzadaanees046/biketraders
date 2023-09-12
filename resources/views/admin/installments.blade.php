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
    <h1>All Installments</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Installments</h5>
                <!-- <button class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Bike</button> -->
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-6">
                  <div class="search-bar mb-3">
                  <form class="search-form d-flex align-items-center" method="post" action="{{route('installment.search')}}">
                    @csrf
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                  </form>
                </div>
  
                </div>

              </div>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Bike</th>
                    <th scope="col">Model</th>
                    <th scope="col">Paid Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($installments as $key => $installment)
                  <tr>
                    <th scope="row">{{$key + 1}} </th>
                    <td> {{$installment->sale->name }} </td>
                    <td> {{$installment->sale->bike->bike_name }} </td>
                    <td>{{$installment->sale->bike->model }} </td>
                    <td>Rs. {{$installment->paid_amount }} </td>
                    @if($installment->status == 1)
                    <td><span class="badge bg-success"><span><i class="bi bi-check-circle"></i></span> Paid<span></td>
                    @else
                    <td><span class="badge bg-warning">Installments<span></td>
                    @endif
                    
                    <td>
                      <a href="{{url('view_installemts', $installment->id)}}" ><span class="badge bg-primary"> View</span></a>
                      
                      <a href="{{url('delete_installemts', $installment->id)}}" onclick="confirmdelete(event)"><span class="badge bg-danger"><span><i class="bi bi-trash"></i></span> Delete
                        </span></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="8"><strong>No Data Found</strong></td>
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