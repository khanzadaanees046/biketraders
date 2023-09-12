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
                <a href="{{route('bikes.add-bike')}}" class="btn btn-success my-3" ><span><i class="bi bi-plus"></i></span> Add Bike</a>
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
                    <th scope="col">Bike Name</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Engine No</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($bikes as $key => $bike)
                  <tr>
                    <th scope="row">{{$bikes->firstitem() + $key }}</th>
                    <td>{{$bike->bike_name }}</td>
                    <td>{{$bike->model }}</td>
                    <td>{{$bike->year }}</td>
                    <td>{{$bike->colour }}</td>
                    <td>{{$bike->engine_no }}</td>
                    <td>Rs. {{$bike->purchase_price }}</td>
                    <td>
                      <span><a data-bs-toggle="modal" data-bs-target="#exampleModal-{{$bike->id}}" class="badge bg-primary"><span><i class="bi bi-pencil-square"></i></span> Edit</a></span>
                      <span>
                        <form action="{{route('bikes.destroy', $bike->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="border: none;" class="badge bg-danger"> <span class="badge bg-danger"><span><i class="bi bi-trash"></i></span> Delete</button>
                        </form>
                      </span> 
                    </td>
                  </tr>
                  <!-- Modal -->
                      <div class="modal fade" id="exampleModal-{{$bike->id}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title"  style="color: #012970;" id="exampleModalLabel">Update Bike</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('bikes.update', $bike->id)}}" method="post">
                              @csrf
                              @method('PUT')
                              <div class="modal-body row">
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Bike Name</label>
                                <input type="text" class="form-control" name="bike_name" value="{{$bike->bike_name }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Capacity</label>
                                <input type="text" class="form-control" name="capacity" value="{{$bike->capacity}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Model</label>
                                <input type="text" class="form-control" name="model" value="{{$bike->model}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Colour</label>
                                <input type="text" class="form-control" name="colour" value="{{$bike->colour}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Year</label>
                                <input type="text" class="form-control" name="year" value="{{$bike->year}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Engine No</label>
                                <input type="text" class="form-control" name="engine_no" value="{{$bike->engine_no}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Chassis No</label>
                                <input type="text" class="form-control" name="chassis_no" value="{{$bike->chassis_no}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                <label for="exampleFormControlInput1" class="form-label">Purchase Price</label>
                                <input type="text" class="form-control" name="purchase_price" value="{{$bike->purchase_price}}">
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
                  @empty
                  <tr>
                    <td colspan="8">No Data Found</td>
                  </tr>
                      @endforelse
                </tbody>
              </table>
              {{ $bikes->links() }}
              <!-- End Default Table Example -->
            </div>
          </div>

        </div>
      </div>
      <!-- End Left side columns -->

    </div>

    <!-- Modal -->
      <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style="color: #012970;" id="exampleModalLabel">Add New Bike</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('bikes.store')}}" method="post">
              @csrf
              <div class="modal-body row">
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Bike Name</label>
                <input type="text" class="form-control" name="bike_name" placeholder="Enter Bike Name">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Capacity</label>
                <input type="text" class="form-control" name="capacity" placeholder="Enter Bike Cpacity">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Model</label>
                <input type="text" class="form-control" name="model" placeholder="Enter Bike Model">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Colour</label>
                <input type="text" class="form-control" name="colour" placeholder="Enter Bike Colour">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Year</label>
                <input type="text" class="form-control" name="year" placeholder="Enter Bike Year">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Engine No</label>
                <input type="text" class="form-control" name="engine_no" placeholder="Enter Bike Engine NO">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Chassis No</label>
                <input type="text" class="form-control" name="chassis_no" placeholder="Enter Bike Chassis No">
                </div>
                <div class="mb-3 col-md-6">
                <label for="exampleFormControlInput1" class="form-label">Purchase Price</label>
                <input type="text" class="form-control" name="purchase_price" placeholder="Enter Price/Bike">
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