@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Product Checkout</h2>
					<div class="page_link">
						<a href="{{ url('') }}">Home</a>
                        <a href="{{ route('cart.index') }}">Cart</a>
						<a href="{{ route('transaksi.create') }}">Checkout</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Billing Details</h3>
						<form class="row contact_form" action="#" method="post" novalidate="novalidate">
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="name" name="name" value="{{ (\Auth::check()) ? \Auth::user()->nama : '' }}" placeholder="Full Name" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="number" placeholder="Phone Number" name="no_telp" value="{{ (\Auth::check()) ? \Auth::user()->no_telp : '' }}" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<select class="col-md-12 form-group p_star" name="city_id" id="city_id">
										<option>Select City .. </option>
										@foreach($dataOngkir as $data)
											<option value="{{ $data['city_id'] }}" data-administrative="{{ $data['type']  }}" data-postal="{{ $data['postal_code'] }}" >{{ $data['city_name'] }}</option>
										@endforeach
								</select>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="wilayah_administratif" placeholder="Administrative area" name="administrative" required readonly>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="kodepos" placeholder="Postal Code" name="postalcode" required readonly>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<h3>Shipping Details</h3>
								</div>
								<textarea class="form-control" id="kecamatan" placeholder="Building names, Street names, Etc ..." name="kecamatan" required></textarea>
								<small class="form-text text-info">*This package will be sent using JNE services</small>
							</div>
						</form>
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Your Order</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
								</li>
									@foreach($all_cart as $cart)
									<li>
										<a href="#">{{ $cart->name }}
											<span class="middle">x {{ $cart->quantity }}</span>
											<span class="last">Rp. {{ helper_money_format($cart->price * $cart->quantity) }}</span>
										</a>
									</li>
									@endforeach
								@endif
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
										<span id="subtotal">Rp. {{ helper_money_format($totalHargaProduk) }}</span>
									</a>
								</li>
								<li>
									<a href="#">Shipping
										<span id="ongkir">Choose the destination first..</span>
									</a>
								</li>
								<li>
									<a href="#">Total
										<span id="total">Rp. {{ helper_money_format($totalHargaProduk) }}</span>
									</a>
								</li>
							</ul>
							@if(Auth::check())
								<input style="width: 100%;" type="submit" name="delete" class="main_btn" value="PROCEED ORDER">
							@else
								<a class="main_btn" href="{{ route('login') }}">Login first to continue ..</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection
