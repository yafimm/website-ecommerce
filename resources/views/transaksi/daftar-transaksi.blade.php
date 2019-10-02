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
							<tr>
								<td>
									
								</td>
								<td>
									<h5></h5>
								</td>
								<td style="float: left;">
									<a href="#" class="genric-btn info circle">Show Order Details</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
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
							<tr>
								<td>
									
								</td>
								<td>
									<h5></h5>
								</td>
								<td style="float: left;">
									<a href="#" class="genric-btn info circle">Show Order Details</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
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
							<tr>
								<td>
									
								</td>
								<td>
									<h5></h5>
								</td>
								<td style="float: left;">
									<a href="#" class="genric-btn info circle">Show Order Details</a>
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