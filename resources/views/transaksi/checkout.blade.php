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
				@include('_partial.flash_message')
				<form class="row contact_form" action="{{ route('transaksi.store') }}" method="post" novalidate="novalidate">
					@csrf
					@method('post')
					<div class="row">
						<div class="col-lg-8">
							<h3>Billing Details</h3>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="name" name="name" value="{{ (\Auth::check()) ? \Auth::user()->nama : '' }}" placeholder="Full Name" required>
									@if($errors->has('name'))
										<small class="form-text text-danger">*{{ $errors->first('name') }}</small>
									@endif
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="number" placeholder="Phone Number" name="no_telp" value="{{ (\Auth::check()) ? \Auth::user()->no_telp : '' }}" required>
									@if($errors->has('no_telp'))
										<small class="form-text text-danger">*{{ $errors->first('no_telp') }}</small>
									@endif	</div>
								<div class="col-md-12 form-group p_star">
									<select class="col-md-12 form-group p_star" name="city_id" id="city_id">
											<option value='' selected="true" disabled="disabled">Select City .. </option>
											@foreach($dataOngkir as $data)
												<option value="{{ $data['city_id'] }}" data-administrative="{{ $data['type']  }}" data-postal="{{ $data['postal_code'] }}" >{{ $data['city_name'].' ('.$data['type'].')' }}</option>
											@endforeach
									</select>
									@if($errors->has('city_id'))
										<small class="form-text text-danger">*{{ $errors->first('city_id') }}</small>
									@endif
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="wilayah_administratif" placeholder="Administrative area" name="administrative" required readonly>
									@if($errors->has('administrative'))
										<small class="form-text text-danger">*{{ $errors->first('administrative') }}</small>
									@endif
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="kodepos" placeholder="Postal Code" name="postalcode" required readonly>
									@if($errors->has('postalcode'))
										<small class="form-text text-danger">*{{ $errors->first('postalcode') }}</small>
									@endif	</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										<h3>Shipping Details</h3>
									</div>
									<textarea class="form-control" placeholder="Building names, Street names, Etc ..." name="alamat_detail" required></textarea>
									@if($errors->has('alamat_detail'))
										<small class="form-text text-danger">*{{ $errors->first('alamat_detail') }}</small>
									@endif	<small class="form-text text-info">*This package will be sent using JNE services</small>
								</div>
								<div class="col-md-12 form-group">
									<div class="creat_account">
										<h3>Note</h3>
									</div>
									<textarea class="form-control" placeholder="write note for the seller" name="note" required></textarea>
									@if($errors->has('note'))
										<small class="form-text text-danger">*{{ $errors->first('note') }}</small>
									@endif
									<small class="form-text text-info">*This note is used to give a message when shipping goods</small>
								</div>
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
									<input style="width: 100%;" type="submit" name="submit" class="main_btn" value="PROCEED ORDER">
								@else
									<a class="main_btn" href="{{ route('login') }}">Login first to continue ..</a>
								@endif
							</div>
						</div>
					</div>
			</form>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection
