<!-- TITLE  -->
@section('title', 'Menu')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.template')

<!-- REQUIRE PAGE  -->
@section('content')

<style>
.panel-body {
    padding: 15px;
}

.panel-body img {
    width: 100%; /* Ensures image is responsive */
    height: auto; /* Maintains aspect ratio */
    max-width: 300px; /* Sets a maximum width */
    border-radius: 5px; /* Optional: adds rounded corners */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Optional: adds shadow */
    margin-bottom: 15px; /* Adds space below the image */
}

.media-body {
    margin-top: 10px;
}
</style>

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            
            <div class="row" style="margin-top:30px;">
                
                <!-- sisi kiri -->
                <div class="col-md-6">
                    <div class="panel panel-primary panel-bordered">
                        <div class="panel-heading">
                            <h5 class="panel-title">Customer Information <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                            <div class="heading-elements">
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="{{ route('order_process') }}" method="POST">
                            @csrf
                            <fieldset class="content-group">
                                
                                <div class="form-group form-group-xs">
                                    <label class="control-label col-lg-3">Email</label>
                                    <div class="col-lg-9">
                                        <input type="email" name="email" id="email" class="form-control text-semibold" placeholder="yourmail@gmail.com" required>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group text-right">
                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-rounded btn-xs">Order Bow <i class="icon-arrow-right14 position-right"></i></button>

                                </div>
                            </fieldset>
                            </form>
                        </div>

                    </div>

                </div>
                <!-- sisi kiri -->

                <!-- sisi kanan -->
                <div class="col-md-6">
                    <div class="panel panel-flat border-left-xlg border-left-info">
                        <div class="panel-body">
                            <img src="{{ asset('assets/book_img/'.$get_data->photo) }}" alt="Book Image" class="img-responsive">
                            <div class="content-group-sm media">
                                <div class="media-body">
                                    <h5 class="text-semibold no-margin">
                                        <a href="#" class="text-default">{{$get_data->title}}</a>
                                    </h5>
                                    <h6 class="text-success text-semibold">Rp. {{ number_format($get_data->price, 0, ',', '.')}}</h6>
                                </div>

                                {{$get_data->description}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sisi kanan -->

            </div>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>

<!-- Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session('success'))
<script>
    swal("Great Jobs :)", "{!! Session::get('success') !!}", "success");
</script>
@elseif(Session('error'))
<script>
    swal("Upps, Sorry", "{!! Session::get('error') !!}", "warning");
</script>
@endif
@endsection
