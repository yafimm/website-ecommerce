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
          <form action="{{ route('user.password.update') }}" method="post" enctype="multipart/form-data">
          	@CSRF
          	@method('PUT')
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
  														<input type="password" class="form-editprofil" name="old_password">
  													</div>
  													<div class="form-group">
  														<span>New Password</span>
  														<input type="password" class="form-editprofil" name="new_password">
  													</div>
  													<div class="form-group">
  														<span>New Password Confirmation</span>
  														<input type="password" class="form-editprofil" name="new_password_confirmation">
  													</div>
  													<div class="form-group">
  														<input style="width : 100%; font-size: 20px;" type="submit" name="update" class="main_btn" value="Update">
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
          </form>
					<!--================End Single Product Area =================-->
@endsection
