<!-- TITLE  -->
@section('title', 'Profile')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.header')

<!-- REQUIRE PAGE  -->
@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <i class="icon-arrow-left52 position-left"></i>
                <span class="text-semibold">Profile</span>
            </h4>
        <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

        <div class="heading-elements">
        </div>
    </div>
</div>
<!-- Page Header -->

<div class="page-container">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Toolbar -->
        <div class="navbar navbar-default navbar-component navbar-xs">
            <ul class="nav navbar-nav visible-xs-block">
                <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="navbar-filter">
                <ul class="nav navbar-nav">
                    <li><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Pengaturan</a></li>
                    <li><a href="#team" data-toggle="tab"><i class="icon-collaboration position-left"></i> Tim Anda</a></li>
                    <li><a href="#changepassword" data-toggle="tab"><i class="icon-spinner11 position-left"></i> Ganti Password</a></li>
                </ul>
            </div>
        </div>
        <!-- /toolbar -->

        <div class="row">
            <div class="col-lg-9">
                <div class="tabbable">
                    <div class="tab-content">

                        <div class="tab-pane fade in active" id="settings">
                            <!-- Account settings -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Account settings</h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <form action="{{ route('profile.update_profile') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="passing_id_user " value="{{ Auth::user()->passing_id_user }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nama</label>
                                                    <input type="text" value="{{ $datanya['data_detail']->name }}" readonly="readonly" class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <input type="text" value="{{ Auth::user()->email }}" readonly="readonly" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <label>User Akses</label>
                                                    <select name="user_akses" class="form-control" required>
                                                        <option value="">--------</option>
                                                        @if( Auth::user()->role == '1')
                                                        <option value="1" selected>Super Admin</option>
                                                        <option value="2">Users</option>
                                                        @else
                                                        <option value="1">Super Admin</option>
                                                        <option value="2" selected>Users</option>
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <label>No Phone</label>
                                                    <input id="phone" type="number" name="phone" class="form-control" value="{{ $datanya['data_detail']->no_phone }}" required  placeholder="Enter Phone number..">
                                                </div>

                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <label>Title</label>
                                                    <select name="title" class="form-control" required>
                                                        @if( $datanya['data_detail']->title == 'CEO')
                                                        <option value="CEO" selected>CEO</option>
                                                        <option value="TECHLEAD">TECHLEAD</option>
                                                        <option value="FULLSTACK">FULLSTACK</option>

                                                        @elseif( $datanya['data_detail']->title == 'TECHLEAD')
                                                        <option value="CEO">CEO</option>
                                                        <option value="TECHLEAD" selected>TECHLEAD</option>
                                                        <option value="FULLSTACK">FULLSTACK</option>
                                                        @else
                                                        <option value="CEO">CEO</option>
                                                        <option value="TECHLEAD">TECHLEAD</option>
                                                        <option value="FULLSTACK" selected>FULLSTACK</option>
                                                        @endif
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <label>Regional</label>
                                                    <select name="region" id="region" class="form-control" required>
                                                        @foreach($datanya['data_refer'] as $row)
                                                        
                                                            @if( $datanya['data_detail']->region == $row->valuenya)
                                                                <option value="{{$row->valuenya}}" selected>{{$row->valuenya}}</option>
                                                            @else
                                                                <option value="{{$row->valuenya}}">{{$row->valuenya}}</option>
                                                            @endif
    
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <label>Division</label>
                                                    <input id="division" type="text" name="division" class="form-control" value="{{ $datanya['data_detail']->division }}" required  placeholder="Enter your division..">
                                                </div>

                                            </div>

                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /account settings -->
                        </div>

                        <div class="tab-pane fade" id="team">
                            <!-- Team -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Tim Anda</h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    Tampilkan semua data team yg masih 1 divisi, join menggunakan table <u>user_details.division</u> 
                                    <br>
                                    <b>DIVISI :</b> {{ $datanya['data_detail']->division }}
                                </div>
                            </div>
                            <!-- /Team -->
                        </div>

                        <div class="tab-pane fade" id="changepassword">
                            <!-- change password -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Ganti Password</h6>
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-styled-left text-blue-800 content-group">
                                                {{ $error }}
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success alert-styled-left text-blue-800 content-group">
                                            {{ session('success') }}
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    @endif

                                    <form action="{{ route('profile.change_password') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Password Lama Anda:</label>
                                                    <input type="password" name="old_password" placeholder="Enter new password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>New password</label>
                                                    <input type="password" name="new_password" placeholder="Enter new password" class="form-control" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Repeat password</label>
                                                    <input type="password" name="new_password_confirmation" placeholder="Repeat new password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /change password -->
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <!-- User thumbnail -->
                <div class="thumbnail">
                    <div class="thumb thumb-rounded thumb-slide">
                        @if( $datanya['data_detail']->photo == "" || empty($datanya['data_detail']->photo) )
                            <img src="assets/profile_picture/profile-circle.png">
                        @else 
                            <img src="assets/profile_picture/{{ $datanya['data_detail']->photo }}">
                        @endif
                        <div class="caption">
                            <span>
                                <button type="button" class="btn bg-success-400 btn-icon btn-xs" data-toggle="modal" data-target="#modal_upload_picture"  data-popup="lightbox"><i class="icon-move-up"></i></button>
                            </span>
                        </div>
                    </div>
                
                    <div class="caption text-center">
                        <h6 class="text-semibold no-margin">{{ Auth::user()->name }} 
                        <small class="display-block"> {{ $datanya['data_detail']->title }}</small></h6>
                    </div>
                </div>
                <!-- /user thumbnail -->
            </div>
        </div>

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

<!-- modal upload picture -->
<div id="modal_upload_picture" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;Upload Picture Profile</h5>
            </div>

            <form action="{{ route('profile.upload_pp') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="alert alert-info alert-styled-left text-blue-800 content-group">
                    <span class="text-semibold">Pilih file photo </span> yg ingin di upload.
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>

                @csrf
                <input type="file" name="photo" required>

            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Tutup</button>
                <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /modal upload picture -->

<!-- datatables -->
<script>
$(function() {

    $('#region').select2();

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        columnDefs: [{ 
            orderable: false,
            width: '100px',
            targets: [ 5 ]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });

    // Scrollable datatable
    $('.datatable-scroll-y').DataTable({
        autoWidth: true,
        scrollY: 300
    });

});
</script>

@endsection
