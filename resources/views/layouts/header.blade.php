<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/drilldown.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/fullcalendar/fullcalendar.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
 	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/select.min.js') }}"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script> -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>

	<!-- visualisasi chart, MATTIN CHART NYA KARNA NABRAK SAMA WEBCAM DAN MAPBOX -->
	<!-- <script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/echarts/echarts.js') }}"></script> -->

	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_responsive.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_extension_buttons_html5.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/components_modals.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/progressbar.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/components_loaders.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/uploader_bootstrap.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/webcamjs/webcam.min.js') }}"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js"></script>

	<!-- MapBox -->
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>

	<!-- pluggin driving directions -->
	<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
	<style>
	.mapboxgl-ctrl-logo {
		display: none !important;
	}
	.mapboxgl-ctrl-attrib-inner{
		display: none !important;
	}
</style>

<style type="text/css">
	#preloader {
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9999; 
		position: fixed;
		background-color: #fff;
	}

	#loadingnya {
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%); 
		position: absolute;
	}


	/* notification styling */
	.dropdown-content-heading {
		padding: 10px;
		border-bottom: 1px solid #ddd;
	}

	.media-list .media {
		padding: 10px;
		border-bottom: 1px solid #ddd;
	}

	.media-list .media:last-child {
		border-bottom: none;
	}
</style>

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-lg bg-primary">
		<div class="navbar-header">
			<ul class="nav navbar-nav no-border visible-xs-block">
				<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle" style="color:black;"><i class="icon-menu7"></i></a></li>
			</ul>

			<div class="navbar-collapse collapse" id="navbar-second-toggle">
				<ul class="nav navbar-nav">
					<?php
					if(Auth::user()->rule == '1'){ ?>
						<li><a href="{{ route('dashboard') }}" style="color:black;"><i class="icon-display4 position-left"></i> Dashboard</a></li>
					<?php } ?>
					<li><a href="{{ route('menu') }}" style="color:black;"><i class="icon-paragraph-justify3 position-left"></i> Menu</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right"></ul>
			</div>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav"></ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						@if( $datanya['data_detail']->photo == "" || empty($datanya['data_detail']->photo) )
                            <img src="assets/profile_picture/profile-circle.png">
                        @else 
                            <img src="assets/profile_picture/{{ $datanya['data_detail']->photo }}">
                        @endif
						<span style="color:black;">{{ Auth::user()->full_name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <i class="icon-switch2"></i> Logout
							</a>
						</li>
					</ul>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

@yield('content')

<!-- button delete on table -->
<script>
    function confirmDeletion(event, url) {
        event.preventDefault();
        if (confirm("Are you sure you want to delete this item?")) {
            window.location.href = url;
        }
    }
</script>
<!-- button delete on table -->

</body>
</html>
