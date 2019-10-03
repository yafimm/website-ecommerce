@extends('template.template')
@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Order Details</h2>
					<div class="page_link">
						<a href="{{ url('') }}">Home</a>
						<a href="{{ route('transaksi.index_user') }}">My Orders</a>
						<a href="{{ route('transaksi.index_user', ['id' => $transaksi->id]) }}">Order Details</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
			@include('_partial.flash_message')
			@if($transaksi->status == 'Done')
			<h2 class="title_confirmation">Thank you. Your order has been received.</h2>
			@elseif($transaksi->status == 'Is being sent')
			<h2 class="title_confirmation text-info">Thank you for shopping at our shop, your order is being shipped.</h2>
			@else
			<h2 style="margin-bottom: 20px;" class="title_confirmation text-danger">Complete payment immediately to complete the transaction !!</h2>
			<div class="payment_item active" style="margin-bottom: 40px;">
				<center>
					<img class="text-center" style="width: 100px; margin-bottom: 10px;" src="img/bri.png" alt="">
					<h5>Please transfer to account number account number in the name <strong> Agus Suparman : 5345546465</strong></h5>
					<h5 style="margin-bottom: 40px;">to complete your order</h5>
				</center>
			</div>
			@endif
			<div class="row order_d_inner">
				<div class="col-lg-8">
					<div class="details_item">
						<h4 class="text-center">Order Info</h4>
						<div class="row">
							<div class="col-lg-6">
								<ul class="list">
									<li>
										<a href="#">
											<span>Order ID</span> : 60235
										</a>
									</li>
									<li>
										<a href="#">
											<span>Date</span> : {{ $transaksi->created_at->format('d M Y') }}
										</a>
									</li>
									<li>
										<a href="#">
											<span>Total</span> : Rp. {{ helper_money_format($transaksi->subtotal + $transaksi->ongkir) }}
										</a>
									</li>
									<li>
										<a href="#">
											<span>Payment Status</span> : <span class="{{ ($transaksi->status == 'Done') ? 'text-success' : ($transaksi->status == 'Is being sent') ? 'text-info' :'text-danger' }}">{{ $transaksi->status }}</span>
										</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list">
									<li>
										<a href="#">
											<span>Full Name</span> : {{ $transaksi->nama }}
										</a>
									</li>
									<li>
										<a href="#">
											<span>Phone Number</span> : {{ $transaksi->no_telp }}
										</a>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li>
								<a href="#">
									<span>Province</span> : {{ $transaksi->provinsi }}</a>
							</li>
							<li>
								<a href="#">
									<span>City</span> : {{ $transaksi->kota }}</a>
							</li>
							<li>
								<a href="#">
									<span>Postcode </span> : {{ $transaksi->kodepos }}</a>
							</li>
							<li>
								<a href="#">
									<span>Details</span> : {{ $transaksi->alamat }}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<div class="table-responsive">
					<table class="table">
						<a href="#" class="genric-btn success radius" style="margin-bottom: 10px;">Back</a>
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transaksi_produk as $produk)
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
									<h5></h5>
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
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection
