@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="{{ url('') }}">Home</a>
						<a href="{{ route('produk.index_produk') }}">Shop</a>
						<a href="{{ route('cart.index') }}">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $subtotal = 0 ?>
							@foreach($all_cart as $cart)
							<?php $subtotal += $cart->price * $cart->quantity ?>
							<tr id="row-{{$cart->id}}">
								<td>
									<div class="media">
										<div class="d-flex">
											<img class="img-checkout" src="{{ asset('images/produk/'. $cart->attributes->image) }}" alt="">
										</div>
										<div class="media-body">
											<p>{{ $cart->name }}</p>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp. {{ $cart->price }}</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" class="qty-cart" name="jumlah" value="{{ $cart->quantity }}" data-id="{{ $cart->id }}" data-price="{{ $cart->price }}" min="1" max="100">
									</div>
								</td>
								<td>
									<h5 id="total-price-{{ $cart->id }}">Rp. {{ $cart->price *  $cart->quantity }}</h5>
								</td>
								<td>
									<input type="submit" name="delete" class="genric-btn danger circle delete-cart" data-id="{{ $cart->id }}"  value="Delete">
								</td>
							</tr>

							@endforeach
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5 id="subtotal-cart">Rp. {{ $subtotal }}</h5>
								</td>
								<td>

								</td>
							</tr>

							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="{{ route('produk.index_produk') }}">Continue Shopping</a>
										<a class="main_btn" href="{{ route('transaksi.create') }}">Proceed to checkout</a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
@endsection
