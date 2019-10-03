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
			@include('_partial.flash_message')
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
							@if($all_cart->isEmpty())
							<div style="margin: 10px;" class="text-center">
								<img class="img-fluid" src="{{ asset('img/empty-cart.png') }}">
								<h3>Your Cart is Empty</h3>
							</div>
							@endif
							<form class="" action="{{ route('cart.update') }}" method="post">
							@csrf
							@method('put')
							<?php $subtotal = 0 ?>
							@foreach($all_cart as $cart)
							<?php $subtotal += $cart->price * $cart->quantity ?>
							<tr id="row-{{$cart->id}}">
								<td>
									<input type="hidden" name="rowId[]" value="{{ $cart->id }}">
									<div class="media">
										<div class="d-flex">
											<img class="img-checkout" src="{{ asset('images/produk/'. $cart->attributes->image) }}" alt="">
										</div>
										<div class="media-body">
											<a href="{{ route('produk.show_produk', $cart->attributes->slug) }}">{{ $cart->name }}</a>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp. {{ helper_money_format($cart->price) }}</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" class="qty-cart" name="quantity[]" value="{{ $cart->quantity }}" data-id="{{ $cart->id }}" data-price="{{ $cart->price }}" min="1" max="100">
									</div>
								</td>
								<td>
									<h5 id="total-price-{{ $cart->id }}">Rp. {{ helper_money_format($cart->price *  $cart->quantity) }}</h5>
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
									<h5 id="subtotal-cart">Rp. {{ helper_money_format($subtotal) }}</h5>
								</td>
								<td>
									@if(!$all_cart->isEmpty())
									<button class="main_btn" type="submit" href="{{ route('cart.update') }}">Update Cart</button>
									<small class="form-text text-info">*Update cart if there are additions</small>
									@endif
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
									@if(!$all_cart->isEmpty())
										<a class="main_btn" href="{{ route('transaksi.create') }}">Proceed to checkout</a>
									@endif
									</div>
								</td>
							</tr>
						 </form>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
@endsection
