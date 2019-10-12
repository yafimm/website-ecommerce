<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Case-Sual</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}">

	<!-- Latest compiled and minified CSS Bootstrap select -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

	<!-- zoom css -->
    <link rel="stylesheet" href="{{ asset('css/zoom.css') }}">
	
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>

    @include('template.navbar')
    @yield('content')
    @include('template.footer')

		<script type="text/javascript">
		var APP_URL = {!! json_encode(url('/')) !!}
		</script>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/yaff_helper.js') }}"></script>
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/stellar.js') }}"></script>
	<script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
	<script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
	<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('vendors/flipclock/timer.js') }}"></script>
	<script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
	<script src="{{ asset('js/mail-script.js') }}"></script>
	<script src="{{ asset('js/theme.js') }}"></script>
	<script src="{{ asset('js/cart.js') }}"></script>
	<script src="{{ asset('js/transaksi.js') }}"></script>
	<script src="{{ asset('js/zoom.js') }} "></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>

	<!-- Latest compiled and minified JavaScript Bootstrap select -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
</body>

</html>
