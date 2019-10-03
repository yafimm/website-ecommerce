@extends('template.template')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Upload Payment Proof</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="tracking.html">Confirmation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area p_120">
        <div class="container">
            <div class="tracking_box_inner">
                <h3 style="margin: 25px;">please upload your proof of transfer to be confirmed by the website owner that you have completed payment</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-form-editprofil text-center" style="padding: 10px;">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="order" name="order" placeholder="Order ID">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <button style="width: 100%;" type="submit" value="submit" class="btn submit_btn">Upload</button>
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
    </section>
    <!--================End Tracking Box Area =================-->
@endsection
