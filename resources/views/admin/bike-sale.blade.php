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
        <h1>New Sale</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <h5 class="card-title">Add Sale</h5>
                            </div>
                            <!-- ---- add form -->
                            <form action="{{route('bike-sales.store')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Engine No</label>
                                        <select name="engine_no" class="" id="select-state" placeholder="Pick a state...">
                                            <option value="">Select a state...</option>
                                            @foreach($bikes as $bike)
                                            <option value="{{$bike->engine_no}}">{{$bike->engine_no}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Bike Name</label>
                                            <input type="text" id="bike_name" class="form-control" name="bike_name" placeholder="Enter Bike Name" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Capacity</label>
                                            <input type="text" id="capacity" class="form-control" name="capacity" placeholder="Enter Bike Cpacity" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Model</label>
                                            <input type="text" id="model" class="form-control" name="model" placeholder="Enter Bike Model" readonly>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <label class="form-label">Colour</label>
                                            <input type="text" id="colour" class="form-control" name="colour" placeholder="Enter Bike Colour" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Year</label>
                                            <input type="text" id="year" class="form-control" name="year" placeholder="Enter Bike Year" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Chassis No</label>
                                            <input type="text" id="chassis_no" class="form-control" name="chassis_no" placeholder="Enter Bike Chassis No" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Purchase Price</label>
                                            <input type="text" id="purchase_price" class="form-control" name="purchase_price" placeholder="Enter Purchase Price" readonly>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Sale Price</label>
                                            <input type="text" id="price" class="form-control" name="sale_price" placeholder="Enter Sale Price" >
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Sale Date</label>
                                            <input type="date" id="" class="form-control" name="sale_date" placeholder="Enter Date" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label">Buyer Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Buyer Name" required>
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" placeholder="Enter Father Name" required>
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label">C.N.I.C</label>
                                            <input type="text" class="form-control" name="cnic" placeholder="Enter CNIC Number" required>
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="paid" >
                                                <label class="form-check-label" for="inlineRadio1">Paid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_method" id="installmentid" value="installment">
                                                <label class="form-check-label" for="installmentid">Installments</label>
                                            </div>

                                        </div>
                                        <!-- <div class="mb-3 col-sm-4 installments">
                                                <label class="form-label">Installment 1</label>
                                                <input type="text" class="form-control" name="installment_1" placeholder="First Installment">
                                        </div>
                                        <div class="mb-3 col-sm-4 installments">
                                                <label class="form-label">Installment 2</label>
                                                <input type="text" class="form-control" name="installment_2" placeholder="Second Installment" readonly>
                                        </div>
                                        <div class="mb-3 col-sm-4 installments">
                                                <label class="form-label">Installment 3</label>
                                                <input type="text" class="form-control" name="installment_3" placeholder="Third Installment" readonly>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="number" class="form-control mb-3" name="advance_payment" id="advance_payment" placeholder="Advance Payment">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <select class="form-select" id="num_inputs">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                <!-- Add more options for up to 12 inputs -->
                                                </select>
    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form_inputs" class="row mb-3"></div>
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
        $('#num_inputs').hide();
        $('#form_inputs').hide();
        $('#advance_payment').hide();
        $('input[type=radio][name=payment_method]').change(function() {
        if (this.value === 'installment') {
            var price = parseFloat($('#price').val());
            if (isNaN(price)) {
                alert('Please enter a valid price');
                $('input[type=radio][name=payment_method][value=paid]').prop('checked', true);
                return;
            }
            $('#num_inputs').show();
            $('#form_inputs').show();
            $('#advance_payment').show();
        };
        });
    });
        function updateInstallments() {
            var numInputs = $('#num_inputs').val();
            var price = parseFloat($('#price').val());
            var new_price = parseFloat($('#advance_payment').val());
            var remaining_payment = price - new_price;
            var installment =  Math.floor(remaining_payment / numInputs);
            installment = Math.ceil(installment/10)*10;
            // var installmentValue = installment(price, numInputs);
            $('#form_inputs').empty();
            for (var i = 1; i <= numInputs; i++) {
                $('#form_inputs').append('<div class="col-md-6"><input class="form-control mb-3" value ="'+installment+ '" type="text" name="input_' + i + '" placeholder="Installment ' + i + '" readonly></div>');
            }
        }

        $('#num_inputs').on('change', function() {
            updateInstallments();
            });
        $('#price').on('keyup', function() {
            updateInstallments();
            });

            $('#advance_payment').on('input', function() {
            updateInstallments();
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
                $('#purchase_price').val(data.purchase_price);
                $('#price').val(data.purchase_price);
                // Calculate installment based on new price
                var new_price = parseFloat(data.purchase_price);
                updateInstallments();
            },
            error: function() {
                alert('Failed to retrieve bike details');
            }
        });
    });
     // ------- this function is for installements
    // function installment(price, numInputs) {
    //     var new_price = parseFloat($('#advance_payment').val());
    //     var remaining_payment = price - new_price;
    //     var installment =  Math.floor(remaining_payment / numInputs);
    //     installment = Math.ceil(installment/10)*10;
    //     return installment;
    // }
// });
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
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ session('message') }}");
    @endif
    @if($errors-> any())
    @foreach($errors-> all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
@endsection