@extends('template.template')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
						<div class="banner_inner d-flex align-items-center">
							<div class="container">
								<div class="banner_content text-center">
									<h2>Profile</h2>
									<div class="page_link">
										<a href="index.html">Home</a>
										<a href="category.html">Profile</a>
										<a href="category.html">Change Password</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Home Banner Area =================-->

					<!--================Single Product Area =================-->
					<div class="product_image_area">
						<div class="container">
							<div style="padding: 50px;">
								<div class="row">
									<div class="col-md-12">
										<div class="box-form-editprofil" style="padding: 10px;">
											<div class="row">
												<div class="col-md-4">
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<span>Old Password</span>
														<input type="text" class="form-editprofil" name="password" value="Dzaki Madhani">
													</div>
													<div class="form-group">
														<span>New Password</span>
														<input type="text" class="form-editprofil" name="password" value="Dzaki Madhani">
													</div>
													<div class="form-group">
														<span>New Password Confirmation</span>
														<input type="text" class="form-editprofil" name="password" value="Dzaki Madhani">
													</div>
													<div class="form-group">
														<input type="submit" name="update" class="btn input-editprofil" value="Update">
													</div>
												</div>
												<div class="col-md-4">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--================End Single Product Area =================-->
@endsection
