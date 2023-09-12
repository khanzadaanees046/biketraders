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
        <h1>New Bike</h1>
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
                            <div class="">
                                <h5 class="card-title">Add Bike</h5>
                            </div>
                            <!-- ---- add form -->
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
                                    <input type="number" class="form-control" name="purchase_price" placeholder="Enter Price/Bike">
                                    </div>
                                    <div class="mb-3 col-6">
                                            <label class="form-label">Purchase Date</label>
                                            <input type="date" id="" class="form-control" name="purchase_date" placeholder="Enter Date" >
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
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
    $(document).ready(function() { 
        $('.installments').hide();
        $('input[type=radio][name=payment_method]').change(function() {
        if (this.value === 'installment') {
            var price = parseFloat($('#price').val());
            installment(price);
            if (isNaN(price)) {
                alert('Please enter a valid price');
                $('input[type=radio][name=payment_method][value=paid]').prop('checked', true);
                return;
            }
            $('.installments').show();
        } else {
            $('.installments').hide();
        }
    });
    // ----------
    $('#select-state').on('change', function() {
        $option = $(this).val();
        // Make AJAX request to server to retrieve bike details
        $.ajax({
            url: '/getBikes/' + $option,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate input fields with bike details
                // alert(data.bike_name);
                $('#bike_name').val(data.bike_name);
                $('#model').val(data.model);
                $('#capacity').val(data.capacity);
                $('#year').val(data.year);
                $('#colour').val(data.colour);
                $('#chassis_no').val(data.chassis_no);
                $('#price').val(data.price);
                // Calculate installment based on new price
                var new_price = parseFloat(data.price);
                installment(new_price);
            },
            error: function() {
                alert('Failed to retrieve bike details');
            }
        });
    });
     // ------- this function is for installements
     function installment(price) {
        
        // with this methode we get value  like this 27166
        // var installment = Math.floor(price / 3);

        //  using thi methode we get 27170 it will add above 1 to 0 like 61 to 70
        var installment = Math.round(Math.ceil(price / 3) / 10) * 10;

        $('input[name=installment_1]').val(installment);
        $('input[name=installment_2]').val(installment);
        $('input[name=installment_3]').val(installment);

        $('input[name=installment_1]').keyup(function() {
            $new_price = $('input[name=installment_1]').val();
            $remainning = price - $new_price ;
            var new_installment = Math.round(Math.ceil($remainning / 2) / 10) * 10;
            // alert(new_installment);
            $('input[name=installment_2]').val(new_installment);
            $('input[name=installment_3]').val(new_installment);
        });
}
});
</script>
<script>
     new TomSelect("#select-state", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    // ------
</script>
<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
@endsection