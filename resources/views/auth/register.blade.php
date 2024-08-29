<!-- TITLE  -->
@section('title', 'Register')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.template')

@section('content')

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Simple login form -->
            <form method="POST" action="{{ route('registerProcess') }}">
                @csrf
                <div class="panel panel-body login-form">

                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group">Regist your account: </h5>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required autofocus placeholder="Enter your username..">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus placeholder="Enter Email..">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Number Phone:</label>
                        <input id="phone" type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autofocus placeholder="Enter Phone number..">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role_akses">Role Akses:</label>
                        <select class="form-control @error('role_akses') is-invalid @enderror" id="role_akses" name="role_akses" required>
                            <option value="">SELECT ROLE ACCESS</option>
                            <option value="1" {{ old('role_akses') == '1' ? 'selected' : '' }}>ADMIN</option>
                            <option value="2" {{ old('role_akses') == '2' ? 'selected' : '' }}>USERS</option>
                            <option value="3" {{ old('role_akses') == '3' ? 'selected' : '' }}>OTHER</option>
                        </select>
                        @error('role_akses')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Repeat Password:</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required placeholder="Repeat your password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit <i class="icon-circle-right2 position-right"></i></button>
                    </div>

                </div>
            </form>
            <!-- /simple login form -->

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


<!-- Alert Validation when user input -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        swal("Upps, Sorry", "{{ $error }}", "warning");
    </script>
    @endforeach
@endif

@endsection
