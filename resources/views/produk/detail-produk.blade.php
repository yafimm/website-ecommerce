@extends('template.template')
@section('content')
<!--================Single Product Area =================-->
<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						 <div class="xzoom-container">
	             			@if($produk->stok <= 0)
        					<div class="centered">
        						<h4>Out of Stock</h4>
        					</div>
        					@endif
                          <img class="xzoom img-fluid" id="xzoom-default" src="{{ asset('images/produk/'. $produk->gambar1)  }}" xoriginal="{{ asset('images/produk/'. $produk->gambar1) }}" />
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
						<p></p>
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
							<a class="main_btn" id="add-to-cart" href="#">Add to Cart</a>
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
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					{{ $produk->deskripsi }} 
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
@endsection
