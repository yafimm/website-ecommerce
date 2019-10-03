@extends('template.template')
@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>My Orders</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="confirmation.html">My Orders</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
			<h1 class="text-center" style="color: #28d500;">My Orders</h1>
			<div style="margin: 10px;" class="text-center">
				<img style="width: 320px;" src="{{ asset('img/empty-cart.png') }}">
				<h3>You Have Not Ordered</h3>
				<a class="main_btn" href="{{ route('kategori.index_user') }}">Shop Now</a>
			</div>

			@foreach($all_transaksi as $transaksi)
			<div class="order_details_table">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transaksi->produk as $produk)
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img class="img-checkout" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="">
										</div>
										<div class="media-body">
											<p>{{ $produk->nama }}</p>
										</div>
									</div>
								</td>
								<td>
									<h5>x {{ $produk->pivot->jumlah }}</h5>
								</td>
								<td>
									<p>Rp. {{ helper_money_format($produk->harga) }}</p>
								</td>

							</tr>
							@endforeach
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp. {{ helper_money_format($transaksi->subtotal) }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Shipping</h4>
								</td>
								<td>
									<h5	></h5>
								</td>
								<td>
									<p>Rp. {{ helper_money_format($transaksi->ongkir) }}</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp. {{ helper_money_format($transaksi->subtotal + $transaksi->ongkir) }}</p>
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>
									<h5></h5>
								</td>
								<td style="float: left;">
										<a href="{{ route('transaksi.index_user',['id' => $transaksi->id	]) }}" class="genric-btn info circle">Show Order Details</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			@endforeach

		</div>
	</section>

		<div class="row">
			<nav class="mx-auto" aria-label="Page navigation example">
				{{ $all_transaksi->links() }}
			</nav>
	</div>
	<!--================End Order Details Area =================-->
@endsection
