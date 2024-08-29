<!-- TITLE  -->
@section('title', 'Menu')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.template')

<!-- REQUIRE PAGE  -->
@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Ebook</span> - Book List</h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="{{ route('login') }}" class="btn btn-link btn-float has-text"><i class="icon-user-check text-primary"></i><span>Login</span></a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->	

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            
            <!-- List -->
            <ul class="media-list">
                
                @foreach($data_book as $row)
                    <li class="media panel panel-body stack-media-on-mobile">
                        <a href="{{ route('order_book', $row->passing_id_book) }}" class="media-left" data-popup="lightbox">
                            <img src="assets/book_img/{{$row->photo}}" width="96" alt="">
                        </a>

                        <div class="media-body">
                            <h3 class="media-heading text-semibold">
                                <a href="{{ route('order_book', $row->passing_id_book) }}">{{$row->title}}</a>
                            </h3>

                            <p class="content-group-sm">{{$row->description}}</p>
                        </div>

                        <div class="media-right text-center">
                            <h6 class="no-margin text-semibold">Rp. {{ number_format($row->price, 0, ',', '.')}}</h6>
                            <a href="{{ route('order_book', $row->passing_id_book) }}" class="btn bg-teal-400 mt-15"><i class="icon-cart-add position-left"></i> Buy Now</a>
                        </div>
                    </li>

                @endforeach
            </ul>
            <!-- /list -->

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
