@extends('template.template')
@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
									<img src="{{ asset('img/product/single-product/s-product-s-2.jpg') }}" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1">
									<img src="{{ asset('img/product/single-product/s-product-s-3.jpg') }}" alt="">
								</li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2">
									<img src="{{ asset('img/product/single-product/s-product-s-4.jpg') }}" alt="">
								</li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									@if($produk->stok <= 0)
									<div class="centered">
										<h4>Out of Stock</h4>
									</div>
									@endif
									<img class="d-block w-100" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="First slide">
								</div>
								<div class="carousel-item">
									@if($produk->stok <= 0)
									<div class="centered">
										<h4>Out of Stock</h4>
									</div>
									@endif
									<img class="d-block w-100" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="Second slide">
								</div>
								<div class="carousel-item">
									@if($produk->stok <= 0)
									<div class="centered">
										<h4>Out of Stock</h4>
									</div>
									@endif
									<img class="d-block w-100" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="Third slide">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<input type="hidden" name="id" value="{{ $produk->id }}">
						<h3>{{ $produk->nama }}</h3>
						<h2>Rp. {{ helper_money_format($produk->harga) }}</h2>
						<ul class="list">
							<li>
								<a class="active" href="{{ route('produk.index_produk_kategori', $produk->kategori->slug) }}">
									<span>Category</span> : {{ $produk->kategori->nama_kategori }}</a>
							</li>
							<li>
								<a href="#" disabled>
									<span>Availibility</span> : {{ $produk->stok }} Stock</a>
							</li>
						</ul>
						<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that
							can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>
						@if($produk->stok > 0)
						<div class="product_count">
							<label for="qty">Quantity:</label>
							<input type="text" name="jumlah" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</div>
						@endif
						<div class="card_area">
							@if($produk->stok <= 0)
							<button class="gray_btn" disabled>Out of stock</button>
							@else
							<a class="main_btn" href="#">Add to Cart</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes
						enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the
						age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then
						Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant
						Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with
						a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided
						that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it
						was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant
						expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and</p>
					<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and
						more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of
						spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one
						would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking
						that is more efficient for one person creating less</p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Width</h5>
									</td>
									<td>
										<h5>128mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Height</h5>
									</td>
									<td>
										<h5>508mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Depth</h5>
									</td>
									<td>
										<h5>85mm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Weight</h5>
									</td>
									<td>
										<h5>52gm</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Quality checking</h5>
									</td>
									<td>
										<h5>yes</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
@endsection
