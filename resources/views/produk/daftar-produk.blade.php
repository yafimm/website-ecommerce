@extends('template.template')
@section('content')
<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-9">
					<div class="product_top_bar">
						<div class="left_dorp">
							Product total : {{ $all_produk->total() }}
						</div>
						<div class="right_page ml-auto">
							<nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									{{ $all_produk->links() }}
								</ul>
							</nav>
						</div>
					</div>
					<div class="latest_product_inner row">
						@foreach($all_produk as $produk)
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="f_p_item">
								<div class="f_p_img">
									<img class="img-fluid" src="{{ asset('images/produk/'.$produk->gambar1) }}" alt="">
									<div class="p_icon">
										<a href="#">
											<i class="lnr lnr-cart"></i>
										</a>
									</div>
								</div>
								<a href="{{ route('produk.show_produk', $produk->slug) }}">
									<h4>{{ $produk->nama }}</h4>
								</a>
								<h5>Rp. {{ $produk->harga }}</h5>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-3">
					<div class="left_sidebar_area">
						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>smartphone category</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<li>
										<a href="{{ route('produk.index_produk') }}">All Category</a>
										<hr>
									</li>
									@foreach($all_kategori as $kategori)
									<li>
										<a href="{{ route('produk.index_produk_kategori', $kategori->slug) }}">{{ $kategori->nama_kategori }}</a>
									</li>
									@endforeach
								</ul>
							</div>
						</aside>

					</div>
				</div>
			</div>

			<div class="row">
				<nav class="cat_page mx-auto" aria-label="Page navigation example">
					{{ $all_produk->links() }}
				</nav>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->
@endsection
