@extends('admin.layouts.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- ---------ye dono file uper deni hn -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
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
        <h1>All Repairing</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
            <!-- @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show"  role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Repairing Lists</h5>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success my-3" ><span><i class="bi bi-plus"></i></span> Add Bike Repairing</a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Bike Repairing</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('repaire-store')}}" method="post">
                                        <!-- ---- add form -->
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3 col">
                                                <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                                                <input type="text" class="form-control mb-3" name="customer_name" placeholder="Enter Customer Name">
                                                <label for="exampleFormControlInput1" class="form-label">Bike Chasis No</label>
                                                <input type="text" class="form-control" name="bike_chase_no" placeholder="Enter Chase No">
                                                <label for="exampleFormControlInput1" class="form-label">Bike No</label>
                                                <input type="text" class="form-control" name="bike_no" placeholder="Enter Bike No">
                                                <label for="exampleFormControlInput1" class="form-label">Receiving Date </label>
                                                <input type="date" class="form-control" name="receiving_date" >
                                                <label for="exampleFormControlInput1" class="form-label">Delivery Date </label>
                                                <input type="date" class="form-control" name="delivery_date" >
                                                <label for="exampleFormControlInput1" class="form-label">Description </label>
                                                <input type="text" class="form-control" name="description" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         <!-- Default Table -->
                         <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Chasis No</th>
                                        <th scope="col">Bike No</th>
                                        <th scope="col">Receive Date</th>
                                        <th scope="col">Delivery Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($repaiers as $key => $repaier)
                                    
                                    <tr>
                                        <th scope="row">{{$repaiers->firstitem() +  $key}}</th>
                                        <td>{{$repaier->customer_name}}</td>
                                        <td>Rs. {{$repaier->bike_chase_no}}</td>
                                        <td>{{$repaier->bike_no}}</td>
                                        <td>{{$repaier->receiving_date}}</td>
                                        <td>{{$repaier->delivery_date}}</td>
                                        @if($repaier->status == 1)
                                        <td><span class="badge bg-success p-2">Replace</span></td>
                                        @else
                                        <td><span class="badge bg-secondary p-2">
                                            Unreplace</span></td>
                                        @endif
                                        <td>{{$repaier->description}}</td>
                                        <td>
                                            <span><a  class="badge bg-secondary p-2" href="{{url('replace-repaire-bike', $repaier->id)}}">Replace</a></span>
                                            <span><a  class="badge bg-success p-2" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$repaier->id}}">Edit</a></span>
                                            <span><a href="{{url('delete-repaier', $repaier->id)}}" class="badge bg-danger p-2">Delete</a></span>
                                        </td>
                                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$repaier->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Expense</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('repaier-update',  ['bikeRepair' => $repaier->id])}}" method="post">
                                                <!-- ---- add form -->
                                                @csrf
                                                <div class="modal-body">
                                                <div class="row">
                                                <div class="mb-3 col">
                                                <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                                                <input type="text" class="form-control mb-3"  value="{{$repaier->customer_name}}" name="customer_name" placeholder="Enter Customer Name">
                                                <label for="exampleFormControlInput1" class="form-label">Bike Chasis No</label>
                                                <input type="text" class="form-control" value="{{$repaier->bike_chase_no}}" name="bike_chase_no" placeholder="Enter Chase No">
                                                <label for="exampleFormControlInput1" class="form-label">Bike No</label>
                                                <input type="text" class="form-control" value="{{$repaier->bike_no}}" name="bike_no" placeholder="Enter Bike No">
                                                <label for="exampleFormControlInput1" class="form-label">Receiving Date </label>
                                                <input type="date" class="form-control" value="{{$repaier->receiving_date}}" name="receiving_date" >
                                                <label for="exampleFormControlInput1" class="form-label">Delivery Date </label>
                                                <input type="date" class="form-control" value="{{$repaier->delivery_date}}" name="delivery_date" >
                                                <label for="exampleFormControlInput1" class="form-label">Description </label>
                                                <input type="text" class="form-control" value="{{$repaier->description}}" name="description" >
                                                </div>
                                            </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10"><strong>No Data Found</strong></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $repaiers->links() }}
                            <!-- End Default Table Example -->
                            
                        </div>

                </div>
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