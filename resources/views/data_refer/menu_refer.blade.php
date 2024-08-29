<!-- TITLE  -->
@section('title', 'Menu Data Refer')

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
                <i class="icon-database position-left"></i>
                <span class="text-semibold">Data Refer:</span>
                <small class="display-block">Menu</small>
            </h4>
        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="{{ route('data_refer.buatrefer') }}" class="btn btn-link btn-float has-text"><i class="icon-file-plus2 text-primary"></i> <span>Buat Refer</span></a>
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
                <h5 class="panel-title">Data Refer</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    Menampilkan semua data <code>refer/rujukan</code> yg bertujuan untuk menjadi opsi nilai disuatu pilihan/select ketika input.
                    <br>
                    <hr>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-striped text-center" id="table-data">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">TITLE</th>
                                <th class="text-center">VALUE</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1; ?>
                            @foreach($datanya['data_refer'] as $row)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $row->title}}</td>
                                <td>{{ $row->valuenya}}</td>
                                <td>
                                    <button class="btn bg-teal btn-sm btn-show" data-toggle="modal" data-target="#show_refer" data-passingid="{{$row->id}}"><i class="icon-database-edit2"></i></button>
                                    <a href="{{ route('data_refer.hapusrefer', $row->id) }}" class="btn btn-warning btn-sm" onclick="confirmDeletion(event, this.href)"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /tampilannya -->

    </div>
</div>
<!-- /page content -->

</div>


<!-- Modal Show data Refer -->
<div class="modal fade" id="show_refer">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="show_refer_label">Menampilkan Data Refer/Rujukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-danger alert-styled-left text-warning content-group">
                        Klik dimanapun untuk menutup <b>modal popup</b> ini!
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                </div>
                <form id="update_data_reffer" class="form-horizontal" method="POST" action="{{ route('data_refer.executeupdaterefer') }}">
                    @csrf
                    <input type="hidden" name="idnya" id="idnya">
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
                        <button type="submit" name="submit" class="btn btn-primary btn-sm" id="btn-submit2">UPDATE</button>
                    </div>
                    
                </form>
            </div>
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
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        
        
        $('#title').select2();
        
        $("#update_data_reffer").submit(function(){
            $("#btn-submit2").prop('disabled', true);
            $('.loader2').show();
        });
        
        
        // buka modalnya
        $(document).on("click", ".btn-show", function() {
            
            var id = $(this).data("passingid"); // Mendapatkan ID dari atribut data
            
            $.ajax({
                url: "{{ route('data_refer.getdetail_datareffer') }}",
                method: "POST",
                data: { id: id },
                success: function(response) {
                    
                    // Mengisi nilai pada form berdasarkan response
                    $("#idnya").val(response.id);
                    $("#title").val(response.title).trigger('change');
                    $("#valuenya").val(response.valuenya);
                    
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

    });
</script>

<!-- ServerSide DataTables -->
<!-- DataTables -->
<script type="text/javascript">
    var table = $('#table-data').DataTable({
        searching: true
    });
</script>

@endsection
