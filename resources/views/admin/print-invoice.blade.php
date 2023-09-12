<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Road King</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
         @media print {
        #printButton {
            display: none;
        }
        .back {
            display: none;
        }

    }
    </style>
</head>
<body>
    <div class="container">
    <main id="main" class="main">
        <div class="pagetitle mb-2 d-flex justify-content-between">
        <a href="{{route('bike-sales.index')}}" class="btn btn-secondary mt-3 back">Back</a>
        <button id="printButton" class="btn btn-primary mt-3" onclick="window.print()">Print this page</button>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3 body-main " id="printdiv">
            <!-- <div class="col-md-12"> -->
               <div class="row">
                    
                    <div class="col-md-8 col-6 text-start mt-1" style="padding-right: 10px;">
                    <img class="img main-logo" style="width: 180px;" alt="Invoce Template" src="{{asset('admin/assets/img/road_king.png')}}" />
                        <!-- <p>221 ,Baker Street</p>
                        <p>042-35947634</p>
                        <p>roadking@gmail.com</p> -->
                    </div>
                    <div class="col-md-4 col-6 text-end">
                        <img class="img main-logo" style="width: 110px;" alt="Invoce Template" src="{{asset('admin/assets/img/pakzon.png')}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h6 class="">Motercycle Sales Certification</h6>
                        <h5 class="text-uppercase"><b> For Registration</b></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="ps-2">It is to clearify that the undermentioned motorcycle has been sold and deliverd to </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-md-9">Mr / Mrs.</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike_sale->name}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">S/O</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike_sale->father_name}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">C.N.I.C</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i>{{$bike_sale->cnic}} </td>
                            </tr>
                            <tr>
                                <td class="">Address</td>
                                <td class=" text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i>{{$bike_sale->address}} </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5 class="text-uppercase mb-2"><b> For Particular of motorcycle</b></h5>
                    </div>
                </div>
                <div>
                    <table class="table" style="border: 1px solid #deb808;">
                        <tbody>
                            <tr>
                                <td class="col-md-9">Maker's Name</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->bike_name}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Horse Power Capacity</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->capacity}}</td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Model</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->model}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Year of Manufacture</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i>{{$bike->year}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Colour</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->colour}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Engine No.</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->engine_no}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Chassis No.</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$bike->chassis_no}} </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Price</td>
                                <td class="col-md-3 text-end"><i class="fas fa-rupee-sign" area-hidden="true"></i> Rs. {{$bike->sale_price}} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="col-md-12">
                        <p><b>Date :</b> {{$bike_sale->created_at}}</p>
                        <!-- <p><b>Signature</b></p> -->
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </div>
 
    </section>

</main><!-- End #main -->
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>