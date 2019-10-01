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
										<a href="category.html">Change Profile</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Home Banner Area =================-->

					<!--================Single Product Area =================-->
					<div class="product_image_area">
						<div class="container">
							<div class="text-center">
								<img style="width: 250px; height: 250px; border-radius: 50%; margin: 20px;" src="img/product/feature-product/f-p-4.jpg">
							</div>
							<div style="padding: 50px;">
								<div class="row">
									<div class="col-md-12">
										<div class="box-form-editprofil" style="padding: 10px;">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<span>Full Name</span>
														<input type="text" class="form-editprofil" name="nama" value="Dzaki Madhani">
													</div>
													<div class="form-group">
														<span>Email</span>
														<input type="text" class="form-editprofil" name="email" value="{{ old('email', $user->email) }}">
													</div>
													<div class="form-group">
														<span>Sex</span>
														<select name="select" id="select" name="jenis_kelamin" class="select-editprofil">
															<option value="0" disabled>Sex</option>
															<option value="Pria" selected="">Male</option>
															<option value="Wanita">Female</option>
														</select>

													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<span>Address</span>
														<textarea style="height: 115px;" name="alamat" class="form-editprofil" rows="5" cols="40">{{ $user->alamat }}</textarea>
													</div>
													<div class="form-group">
														<span>Phone</span>
														<input type="text" class="form-editprofil" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<span>Facebook</span>
														<input type="text" class="form-editprofil" name="facebook" value="{{ old('facebook', $user->facebook) }}">
													</div>
													<div class="form-group">
														<span>Twitter</span>
														<input type="text" class="form-editprofil" name="twitter" value="{{ old('twitter', $user->twitter)}}">
													</div>
													<div class="form-group">
														<span>Instagram</span>
														<input type="text" class="form-editprofil" name="instagram" value="{{ old('instagram', $user->instagram) }}">
													</div>
													<div class="form-group">
														<span>Linked In</span>
														<input type="text" class="form-editprofil" name="linkedin" value="{{ old('linkedin', $user->linkedin) }}">
													</div>
												</div>
											</div>
											<div class="form-group">
												<input type="submit" name="update" class="btn input-editprofil" value="Update">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--================End Single Product Area =================-->
@endsection
