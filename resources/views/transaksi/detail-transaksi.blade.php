@extends('template.template')
@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Order Details</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="confirmation.html">My Orders</a>
						<a href="confirmation.html">Order Details</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Order Details Area =================-->
	<section class="order_details p_120">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			<div class="row order_d_inner">
				<div class="col-lg-8">
					<div class="details_item">
						<h4 class="text-center">Order Info</h4>
						<div class="row">
							<div class="col-lg-6">
								<ul class="list">
									<li>
										<a href="#">
											<span>Order number</span> : 60235
										</a>
									</li>
									<li>
										<a href="#">
											<span>Date</span> : Los Angeles
										</a>
									</li>
									<li>
										<a href="#">
											<span>Total</span> : USD 2210
										</a>
									</li>
									<li>
										<a href="#">
											<span>Payment Status</span> : Unpdaid
										</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul class="list">
									<li>
										<a href="#">
											<span>Full Name</span> : Dzaki Madhani
										</a>
									</li>
									<li>
										<a href="#">
											<span>Phone Number</span> : 081395746530
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
									<span>Districrt</span> : Dayeuhkolot</a>
							</li>
							<li>
								<a href="#">
									<span>City</span> : Kab. Bandung</a>
							</li>
							<li>
								<a href="#">
									<span>Postcode </span> : 36952</a>
							</li>
							<li>
								<a href="#">
									<span>Details</span> : steet name, building name, etc...
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
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img class="img-checkout" src="img/product/single-product/cart-1.jpg" alt="">
										</div>
										<div class="media-body">
											<p>Minimalistic shop for multipurpose use</p>
										</div>
									</div>
								</td>
								<td>
									<h5>x 02</h5>
								</td>
								<td>
									<p>$1000.00</p>
								</td>
								
							</tr>
							
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$2000.00</p>
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
									<p>Flat rate: $50.00</p>
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
									<p>$2050.00</p>
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