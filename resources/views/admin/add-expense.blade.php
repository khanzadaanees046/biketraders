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
        <h1>All Expenses</h1>
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
                                <h5 class="card-title">Expenses Lists</h5>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success my-3" ><span><i class="bi bi-plus"></i></span> Add Expense</a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Expense</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('expense-store')}}" method="post">
                                        <!-- ---- add form -->
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3 col">
                                                <label for="exampleFormControlInput1" class="form-label">Price</label>
                                                <input type="text" class="form-control mb-3" name="expense_name" placeholder="Enter Expense Name">
                                                <input type="number" class="form-control" name="total_expense" placeholder="Enter Expense Price">
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
                                        <th scope="col">Expense Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($expenses as $key => $expense)
                                    
                                    <tr>
                                        <th scope="row">{{$expenses->firstitem() + $key}}</th>
                                        <td>{{$expense->expense_name}}</td>
                                        <td>Rs. {{$expense->total_expense}}</td>
                                        <td>{{$expense->created_at}}</td>
                                        <td>
                                            <span><a  class="badge bg-success p-2" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$expense->id}}">Edit</a></span>
                                            <span><a href="{{url('delete-expense', $expense->id)}}" class="badge bg-danger p-2">Delete</a></span>
                                        </td>
                                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$expense->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Expense</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('expense-update', ['id' => $expense->id])}}" method="post">
                                                <!-- ---- add form -->
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="mb-3 col">
                                                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                                                        <input type="text" class="form-control mb-3" name="expense_name" value="{{$expense->expense_name}}">
                                                        <input type="number" class="form-control" name="total_expense" value="{{$expense->total_expense}}">
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
                            {{ $expenses->links() }}
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