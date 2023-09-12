@extends('admin.layouts.app')
@section('css')
<style>
    .toast-success {
        background-color: #2e844a !important;
    }

    /* Set the text color of success messages to white */
    .toast-success .toast-message {
        color: white !important;
    }
</style>
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle mb-5">
        <h1>All Bikes Sales</h1>
        
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Sales Bikes</h5>
                                <a href="{{route('bike-sales.add_bike')}}" class="btn btn-success my-3"><span><i class="bi bi-plus"></i></span> Add Sale</a>
                            </div>
                            <div class="row">
                                    <div class="col-md-2 col-sm-6">
                                    <div class="search-bar mb-3">
                                    <form class="search-form d-flex align-items-center" method="post" action="{{route('bike-sale.search')}}">
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
                                        <th scope="col">Father Name</th>
                                        <th scope="col">CNIC</th>
                                        <th scope="col">Bike</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Engine No</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                    @forelse($sales as $sale)
                                    
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$sale->name}}</td>
                                        <td>{{$sale->father_name}}</td>
                                        <td>{{$sale->cnic}}</td>
                                        <td>{{$sale->bike->bike_name}}</td>
                                        <td>{{$sale->bike->model}}</td>
                                        <td>{{$sale->bike->colour}}</td>
                                        <td>{{$sale->bike->engine_no}}</td>
                                        <td>Rs. {{$sale->bike->sale_price}}</td>
                                        <td><a href="bike-sales/invoice/{{$sale->id}}" class="badge bg-primary">View Invoice</a></td>
                                      
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10"><strong>No Data Found</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $sales->links() }}
                            <!-- End Default Table Example -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Left side columns -->

        </div>
       
    </section>

</main>
<!-- End #main -->

@endsection
@section('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.6.3.js"></script> -->


    <script type="text/javascript">
      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    
      $(".select-bike").change(function(e){      
          e.preventDefault();
          var bikeName = $(this).val();
          $.ajax({
             type:'get',
             url: 'getBikes/'+ bikeName,
             success:function(response){
                var models = response.models;
                var colorOptions = '';
                var modelOptions = '';
                    for (var i = 0; i < models.length; i++) {
                        modelOptions += '<option value="' + models[i].model + '">' + models[i].model + '</option>';
                    }
                    $('#bikeModel').html(modelOptions);
                    var model =$('#bikeModel').val();
                    getcolor(model);
             }
          });
      
      });

      $("#bikeModel").change(function(e){      
          e.preventDefault();
          var bikeModel = $(this).val();
        getcolor(bikeModel);
      
      });
    function getcolor(bikeModel){
        $.ajax({
             type:'get',
             url: 'getBikeColors/'+ bikeModel,
             success:function(response){
                var colors = response.colors;
                var colorOptions = '';
                    for (var i = 0; i < colors.length; i++) {
                        colorOptions += '<option value="' + colors[i].colour + '">' + colors[i].colour + '</option>';
                    }
                    $('#bikeColor').html(colorOptions);
             }
          });
    }
      function printErrorMsg (msg) {
          $(".print-error-msg").find("ul").html('');
          $(".print-error-msg").css('display','block');
          $.each( msg, function( key, value ) {
              $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
          });
      }

</script>
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