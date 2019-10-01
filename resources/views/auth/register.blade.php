@extends('template.template')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
						<div class="banner_inner d-flex align-items-center">
							<div class="container">
								<div class="banner_content text-center">
									<h2>Register</h2>
									<div class="page_link">
										<a href="index.html">Home</a>
										<a href="registration.html">Register</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Home Banner Area =================-->

					<!--================Login Box Area =================-->
					<section class="login_box_area p_120">
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<div class="login_box_img">
										<img class="img-fluid" src="img/login.jpg" alt="">
										<div class="hover">
											<h4>Already have an account??</h4>
											<p>login now to enjoy complete access to our website</p>
											<a class="main_btn" href="#">Login</a>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="login_form_inner reg_form">
										<h3>Create an Account</h3>
										<form class="row login_form" action="{{ route('register') }}" method="post" id="contactForm" novalidate="novalidate">
                      @csrf
                      @method('post')
                    	<div class="col-md-12 form-group">
												<input class="form-control" type="text" name="username" placeholder="Username" value="">
											</div>
                      <div class="col-md-12 form-group">
												<input class="form-control" type="text" name="nama" placeholder="Full name" value="">
											</div>
											<div class="col-md-12 form-group">
												<select name="jenis_kelamin" id="select" class="form-control" value="jenis_kelamin">
													<option value="" disabled>Gender</option>
													<option value="Pria">Male</option>
													<option value="Wanita">Female</option>
												</select>
											</div>
											<div class="col-md-12 form-group">
												<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
											</div>
											<div class="col-md-12 form-group">
												<input type="password" class="form-control" id="password" name="password" placeholder="Password">
											</div>
											<div class="col-md-12 form-group">
												<input type="password" class="form-control" id="pass" name="confirmation_password" placeholder="Confirm password">
											</div>
											<div class="col-md-12 form-group">
												<button type="submit" value="submit" class="btn submit_btn">Register</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Login Box Area =================-->
@endsection
