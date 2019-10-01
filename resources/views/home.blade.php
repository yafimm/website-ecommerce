@extends('template.template')
@section('content')
	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Case For
							<br />Your Smartphones</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
						<a class="white_bg_btn" href="#">View Collection</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->


	<!--================Clients Logo Area =================-->
	<section class="clients_logo_area" style="margin-top: 100px;">
		<div class="container-fluid">
			<div class="clients_slider owl-carousel">
				<div class="item">
					<img style="width: 109px; " src="img/clients-logo/c-logo-1.png" alt="">
				</div>
				<div class="item">
					<img style="width: 109px;" src="img/clients-logo/c-logo-2.png" alt="">
				</div>
				<div class="item">
					<img style="width: 109px;" src="img/clients-logo/c-logo-3.png" alt="">
				</div>
				<div class="item">
					<img style="width: 109px;" src="img/clients-logo/c-logo-4.png" alt="">
				</div>
				<div class="item">
					<img style="width: 70px;" src="img/clients-logo/c-logo-5.png" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Featured Products</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
				<div class="row">
					@foreach($featured_produk as $produk)
					<div class="col col1">
						<div class="f_p_item">
							<div class="f_p_img">
								<img class="img-fluid" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="">
								<div class="p_icon">
									<a href="#">
										<i class="lnr lnr-heart"></i>
									</a>
									<a href="#">
										<i class="lnr lnr-cart"></i>
									</a>
								</div>
							</div>
							<a href="#">
								<h4>{{ $produk->nama }}</h4>
							</a>
							<h5>Rp. {{ number_format($produk->harga) }}</h5>
						</div>
					</div>
					@endforeach
				</div>

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">01</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">02</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">03</a>
							</li>
							<li class="page-item blank">
								<a class="page-link" href="#">...</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">09</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->

@endsection
