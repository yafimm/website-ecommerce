<!--================Header Menu Area =================-->
<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="img/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item active">
										<a class="nav-link" href="{{ url('') }}">Home</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="category.html">Shop Category</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="checkout.html">Product Checkout</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="confirmation.html">Confirmation</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.html">Contact</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.html">About Us</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">


									<hr>

									<li class="nav-item">
										<a href="#" class="icons">
											<i class="lnr lnr lnr-cart"></i>
										</a>
									</li>


									<hr>

									@if(Auth::check())
									<li class="nav-item submenu dropdown">
										<a href="#" class="icons nama-pengguna">
											<i class="fa fa-user" aria-hidden="true"></i>
											{{ Auth::user()->username }}
										</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="category.html">Profile</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="single-product.html">Change Profiles</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="checkout.html">Change Password</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="cart.html">Transaction</a>
											</li>
											<li class="nav-item text-center">
												<a href="#" class="nav-link logout" style="font-size: 13px; font-weight: bold;" href="{{ route('logout') }}"  onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
												LOGOUT
												</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
												</form>
											</li>
										</ul>
									</li>

									<hr>
									@else
									<li class="nav-item">
										<a href="{{ route('login') }}" class="icons" style="font-size: 13px; font-weight: bold;">
											LOGIN
										</a>
									</li>
									<hr>
									<li class="nav-item">
										<a href="{{ route('register') }}" class="icons" style="font-size: 13px; font-weight: bold;">
											REGISTER
										</a>
									</li>
									<hr>
									@endif

								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->
