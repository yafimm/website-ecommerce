@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
						<div class="banner_inner d-flex align-items-center">
							<div class="container">
								<div class="banner_content text-center">
									<h2>Profile</h2>
									<div class="page_link">
										<a href="{{ url('') }}">Home</a>
										<a href="{{ route('user.show', \Auth::user()->username) }}">Profile</a>
										<a href="{{ route('user.profile.edit') }}">Change Profile</a>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!--================End Home Banner Area =================-->

					<!--================Single Product Area =================-->
					<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
						@CSRF
						@method('PUT')
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
																<input type="text" class="form-editprofil" name="nama" value="{{ old('nama', \Auth::user()->nama) }}">
															</div>
															<div class="form-group">
																<span>Email</span>
																<input type="text" class="form-editprofil" name="email" value="{{ old('email', \Auth::user()->email) }}">
															</div>
															<div class="form-group">
																<span>Sex</span>
																<select name="select" id="select" name="gender" class="select-editprofil">
																	<option value="0" disabled>Sex</option>
																	<option value="Pria" selected="">Male</option>
																	<option value="Wanita">Female</option>
																</select>

															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<span>Address</span>
																<textarea style="height: 115px;" name="alamat" class="form-editprofil" rows="5" cols="40">{{ \Auth::user()->alamat }}</textarea>
															</div>
															<div class="form-group">
																<span>Phone</span>
																<input type="text" class="form-editprofil" name="no_telp" value="{{ old('no_telp', \Auth::user()->no_telp) }}">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<span>Facebook</span>
																<input type="text" class="form-editprofil" name="facebook" value="{{ old('facebook', \Auth::user()->facebook) }}">
															</div>
															<div class="form-group">
																<span>Twitter</span>
																<input type="text" class="form-editprofil" name="twitter" value="{{ old('twitter', \Auth::user()->twitter)}}">
															</div>
															<div class="form-group">
																<span>Instagram</span>
																<input type="text" class="form-editprofil" name="instagram" value="{{ old('instagram', \Auth::user()->instagram) }}">
															</div>
															<div class="form-group">
																<span>Linked In</span>
																<input type="text" class="form-editprofil" name="linkedin" value="{{ old('linkedin', \Auth::user()->linkedin) }}">
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
						</form>
					<!--================End Single Product Area =================-->
@endsection
