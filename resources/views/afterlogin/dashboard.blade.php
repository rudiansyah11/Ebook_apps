<!-- TITLE  -->
@section('title', 'Dashboard')

<!-- EXTENTION WITH HEADER  -->
@extends('layouts.header')

<!-- REQUIRE PAGE  -->
@section('content')

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4>
                <i class="icon-arrow-right5 position-left"></i>
                <span class="text-semibold">Dashboard</span>
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

        <!-- tampilannya -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Dashboard bebas</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <h1>Binggung mau nampilin apa!</h1>
                <br>
                DataTables has the option of being able to <code>save the state</code> of a table: its paging position, ordering state etc., so that is can be restored when the user reloads a page, or comes back to the page after visiting a sub-page. This state saving ability is enabled by the <code>stateSave</code> option. The <code>duration</code> for which the saved state is valid can be set using the <code>stateDuration</code> initialisation parameter (2 hours by default).
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


<!-- datatables -->
<script>
$(function() {

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
