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
						<a href="index.html">Home</a>
                        <a href="checkout.html">Chart</a>
						<a href="checkout.html">Checkout</a>
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
								<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="number" placeholder="Phone Number" name="number" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="provinsi" placeholder="Province" name="provinsi" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="kota" placeholder="City" name="kota" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="kecamatan" placeholder="District" name="kecamatan" required>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="kodepos" placeholder="Postal Code" name="kodepos" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<h3>Shipping Details</h3>
								</div>
								<textarea class="form-control" id="kecamatan" placeholder="Building names, Street names, Etc ..." name="kecamatan" required></textarea>
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
								<li>
									<a href="#">Fresh Blackberry
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
								<li>
									<a href="#">Fresh Tomatoes
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
								<li>
									<a href="#">Fresh Brocoli
										<span class="middle">x 02</span>
										<span class="last">$720.00</span>
									</a>
								</li>
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
										<span>$2160.00</span>
									</a>
								</li>
								<li>
									<a href="#">Shipping
										<span>Flat rate: $50.00</span>
									</a>
								</li>
								<li>
									<a href="#">Total
										<span>$2210.00</span>
									</a>
								</li>
							</ul>
							<input style="width: 100%;" type="submit" name="delete" class="main_btn" value="PROCEED ORDER">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection