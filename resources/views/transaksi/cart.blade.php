@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="index.html">Home</a>
						<a href="cart.html">Cart</a>
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
									<h5>$360.00</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" id="tentacles" name="tentacles" value="1" min="1" max="100">
									</div>
								</td>
								<td>
									<h5>$720.00</h5>
								</td>
								<td>
									<input type="submit" name="delete" class="genric-btn danger circle" value="delete">
								</td>
							</tr>
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
									<h5>$360.00</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" id="tentacles" name="tentacles" value="1" min="1" max="100">
									</div>
								</td>
								<td>
									<h5>$720.00</h5>
								</td>
								<td>
									<input type="submit" name="delete" class="genric-btn danger circle" value="delete">
								</td>
							</tr>
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
									<h5>$360.00</h5>
								</td>
								<td>
									<div class="product_count">
										<input type="number" id="tentacles" name="tentacles" value="1" min="1" max="100">
									</div>
								</td>
								<td>
									<h5>$720.00</h5>
								</td>
								<td>
									<input type="submit" name="delete" class="genric-btn danger circle" value="delete">
								</td>
							</tr>
							
							<tr>
								<td>

								</td>
								<td>

								</td>
								<td>
									<h5>Subtotal</h5>
								</td>
								<td>
									<h5>$2160.00</h5>
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
										<a class="gray_btn" href="#">Continue Shopping</a>
										<a class="main_btn" href="#">Proceed to checkout</a>
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