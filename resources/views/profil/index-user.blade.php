@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
						<div class="banner_inner d-flex align-items-center">
							<div class="container">
								<div class="banner_content text-center">
									<h2>Profile</h2>
									<div class="page_link">
										<a href="index.html">Home</a>
										<a href="category.html">Profile</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Home Banner Area =================-->

					<!--================Single Product Area =================-->
					<div class="product_image_area">
						<div class="container">
							<div class="text-center">
								<h3 style="color: black; ">{{ $user->nama }}</h3>
								<img style="width: 250px; height: 250px; border-radius: 50%; margin: 20px;" src="{{ asset('img/product/feature-product/f-p-4.jpg') }}">
							</div>

						 	@if(Auth::user()->username == $user->username)
							<div class="text-center">
								<a href="{{ route('user.profile.edit') }}" class="main_btn" style="font-size: 20px !important; margin: 10px;">Change Profile</a>
								<a href="{{ route('user.password.edit') }}" class="main_btn" style="font-size: 20px !important; margin: 10px;">Change Password</a>
								<a href="{{ route('transaksi.index_user') }}" class="main_btn" style="font-size: 20px !important; margin: 10px;">My Orders</a>
							</div>

							@endif
							<div style="padding: 50px;">
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4 info-profil-span" >
													<span>Email</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->email }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4 info-profil-span">
													<span>Phone</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->no_telp }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4 info-profil-span">
													<span>Sex</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->gender }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4 info-profil-span">
													<span>Address</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->alamat }}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4  info-profil-span">
													<span>Facebook</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->facebook }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4  info-profil-span">
													<span>Twitter</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->twitter }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4  info-profil-span" >
													<span>Instagram</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->instagram }}</p>
												</div>
											</div>
										</div>
										<div class="col-md-12 info-profil-grup">
											<div class="row">
												<div class="col-md-4  info-profil-span">
													<span>Linked In</span>
												</div>
												<div class="col-md-8 info-profil">
													<p>{{ $user->linkedin }}</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--================End Single Product Area =================-->
@endsection
