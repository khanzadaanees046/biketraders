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
    <h1>All Bikes</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Bikes</h5>
                
              </div>
              <div class="row">
                <div class="col-md-2 col-sm-6">
                  <div class="search-bar mb-3">
                  <form class="search-form d-flex align-items-center" method="post" action="{{route('bikes.search')}}">
                    @csrf
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                  </form>
                </div>
  
                </div>

              </div>

              <!-- Default Table -->
              <table class="table" id="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bike</th>
                    <th scope="col">Model</th>
                    <th scope="col">Purchase Price</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($bikes as $key => $bike)
                  <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{$bike->bike_name }}</td>
                    <td>{{$bike->model }}</td>
                    <!-- <td>{{$bike->year }}</td> -->
                    <td>Rs. {{$bike->purchase_price }}</td>
                    
                  </tr>
                   @empty
                  <tr>
                    <td colspan="8">No Data Found</td>
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

@endsection