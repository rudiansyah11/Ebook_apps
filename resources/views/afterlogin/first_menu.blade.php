<!-- TITLE  -->
@section('title', 'Menu')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.header')

<!-- REQUIRE PAGE  -->
@section('content')

<style>
    .container{
        font-size:36px;
    }

    .row{
        margin-bottom:20px;
    }

    .text-title{
        font-size:51px;
        font-weight:bold;
    }

    hr {
        height: 3px;
        background-color: black;
        border: none;
    }

    .icon-download{
        font-size:50px;
    }

    h6{
        font-size:20px;
    }

    .full-width-container {
        width: 100%;
        background-color: black;
        color: white; 
        padding: 20px; 
        text-align:center;
    }

</style>
<div class="container text-center">
    
    <div class="row col-md-12">
        <h1 class="text-title">Congratulations On Your Purchase!</h1>
        <img src="{{ asset('assets/book_img/aflog.png') }}"  alt="Gambar" class="img-fluid mx-auto d-block rounded">
    </div>

    <div class="row col-md-12">
        <p><strong>
            The Billionaire Brain Wave digital audio track (and all its bonuses!) has been emailed to the email address you used during checkout, so you'll also have it as a backup! If you have any questions, check out our FAQ here:&nbsp; 
            <span style="text-decoration: underline;"><a href="{{ route('faq') }}" target="_blank">FAQ</a></span>
        </strong></p>
    </div>

    
    <div class="row col-md-12">
        <hr>
        <p><strong>
            <i class="icon-arrow-right16 text-primary"></i> Download The Billionaire Brain Wave And Everything You Got Inside With A Single Click!
        </strong></p>
        <br>
        <span>
            <i class="icon-download"></i>
        </span>
    </div>

    <div class="row col-md-12">
        <a href="{{ asset('assets/Billionaire-Brain-Wave-Full1.zip') }}" class="btn btn-primary" download> 
            <b><i class="icon-arrow-down7"></i> Download</b>
        </a>

        <h6>Just click on the button above to download the complete Billionaire Brain Wave package <br> Or use the individual download links below…</h6>
    </div>

    <div class="row col-md-12">
        <hr>
        <br>
        <img src="{{ asset('assets/book_img/aflog.png') }}"  alt="Gambar" widht="300" height="160" class="rounded mx-auto d-block img-sound">
        <br>
        <a href="{{ asset('assets/book_img/file/7-Minutes-Morning-Rituall.mp3') }}" class="btn btn-primary" download> 
            <b><i class="icon-arrow-down7"></i> Download</b>
        </a>
        <h6>Download Your <b>Billionaire Brain Wave Digital Audio Track.</b></h6>
    </div>
</div>

<div class="full-width-container">
    <div class="container">
        <div class="row">
            <p style="margin-bottom:20px;">
                <strong>
                    Download Your Bonus
                </strong>
            </p>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/billionaire-brain-wave-stories.jpg') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/book_img/file/500-Billionaire-Brain-Wave-Success-Stories-1.pdf') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/the_warren_buffett.png') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/The-Warren-Buffett-Pyramid.pdf') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/17-Millionaire-Secrets.png') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/book_img/file/17-Millionaire-Secrets.pdf') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/7-lazy-millionaire-habits.png') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/book_img/file/7-Lazy-Millionaire-Habits.pdf') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/quick-cash-manifestation.jpg') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/Easy-Sleep-soundwave.png') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/book_img/file/Easy-Sleep-soundwave.mp3') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 212px; margin-bottom:10px;">
                    <img src="{{ asset('assets/book_img/15-Tips-for-the-mature-healthy-heart.png') }}" class="card-img-top rounded" alt="Card image" style="width: 100%; height: auto; border-radius: 10%;">
                    <div class="card-body text-center">
                        <a href="{{ asset('assets/book_img/file/Fast-Cash-Manifestation.mp3') }}" class="btn btn-success" download>
                            <b><i class="icon-arrow-down7"></i> Download Book</b>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container text-center">
    <h6>Have A Question? Please Review Our FAQ (Frequently Asked Questions) <br>Here: The Billionaire Brain Wave Frequently Asked Questions </h6>

    <br>
    <h6>
        Privacy Policy | Terms & Conditions | Contact
        <br>
        Copyright 2023 The Billionaire Brain Wave. All Right Reserved.
    </h6>
</div>



@endsection
