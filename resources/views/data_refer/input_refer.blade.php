<!-- TITLE  -->
@section('title', 'Input New Refer')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.header')

<!-- REQUIRE PAGE  -->
@section('content')

<style>
.loader{
    display: none;
}

.loader2{
    display: none;
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <i class="icon-arrow-left52 position-left"></i>
                <span class="text-semibold">Data Refer</span>
                <small class="display-block">Tambah Data Refer</small>
            </h4>
        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="{{ route('data_refer.menu') }}" class="btn btn-link btn-float has-text"><i class="icon-reply text-primary"></i> <span>Kembali</span></a>
            </div>
        </div>
    </div>
</div>
<!-- Page Header -->

<div class="page-container">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- tampilannya -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Input Data Refer</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="row col-md-6">
                    <form action="{{ route('data_refer.executebuatrefer') }}" method="POST" class="form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label class="control-label col-lg-4">TITLE:<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <select class="form-control input-xs" name="title" id="title" data-live-search="true" required>
                                <option value="">--- SELECT TITLE ---</option>
                                @foreach($datanya['ref_titles'] as $row)
                                    <option value="{{ $row->title }}">{{ $row->title }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4">VALUE: <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" required placeholder="Masukan nilainya" name="valuenya" id="valuenya">
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="loader2">
                                <img src="{{ asset('assets/spinner/spinner.gif') }}" style="width: 65px; height: 60px;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm" id="btn-submit2">SUBMIT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- /tampilannya -->

    </div>
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

<script>
    $(document).ready(function(){
        
        $('#title').select2();
        
        $("#update_data_reffer").submit(function(){
            $("#btn-submit2").prop('disabled', true);
            $('.loader2').show();
        });

    });
</script>
@endsection
