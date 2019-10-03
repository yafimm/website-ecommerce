@extends('template-admin.template')
@section('content')
<div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h1>
                                            <strong>Update This Product</strong>
                                        </h1>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="product-name" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="product-name" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="product-stock" class=" form-control-label">Stok</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input style="width: auto !important;" type="number" id="product-stock" name="text-input" min="1" max="1000" value="1" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="description" class=" form-control-label">description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="textarea-input" rows="9" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="category" class=" form-control-label">Phone Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Asus</option>
                                                        <option value="2">Vivo</option>
                                                        <option value="3">Oppo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="images-1" class=" form-control-label">Product Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="images-1" name="images-1" class="form-control-file">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection