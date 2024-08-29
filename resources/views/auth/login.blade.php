<!-- TITLE  -->
@section('title', 'Login')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.template')

<!-- REQUIRE PAGE  -->
@section('content')
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">
            
            <!-- Simple login form -->
            <form method="POST" action="{{ route('loginProcess') }}">
                @csrf
                <div class="panel panel-body login-form">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                    </div>

                    <div class="text-center">
                        <a href="#" data-toggle="modal" data-target="#modal_show_email">Don't have password? click here!</a>
                    </div>

                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
            <!-- /simple login form -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>

<div id="modal_show_email" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title text-center">Automatic Generate Password</h5>
            </div>

            <form class="form-horizontal" id="form-submit" action="{{ route('genpass') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="col-md-12 form-group">
                    <label>Email:</label>
                    <input type="email" name="email_generate" id="email_generate" class="form-control text-semibold" placeholder="yourmail@gmail.com" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary">Send</button>
            </div>
            </form>
        </div>
    </div>
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
