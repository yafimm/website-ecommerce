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
          </div>
          <form class="" action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
            @CSRF
            @method('put')
            <input type="hidden" name="id" value="{{ $kategori->id }}">
            <div class="col-md-6">
                <h3 class="title-5 m-b-35 text-center">Edit Category</h3>
                <!-- <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th style="color: #e5e5e5;">id</th>
                                <th style="color: #e5e5e5;">name</th>
                                <th style="color: #e5e5e5;">action</th>
                            </tr>
                        </thead>
                    </table>
                </div> -->
                <div class="card">
                    <form class="" action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype="multipart/form-data">
                      @CSRF
                      @method('put')
                      <div class="card-body card-block">
                          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <div class="row form-group">
                                  <div class="col col-md-3">
                                      <label for="phone-name" class=" form-control-label">Category Name</label>
                                  </div>
                                  <div class="col-12 col-md-9">
                                      <input type="text" id="phone-name" name="name" placeholder="Category name" value="{{ $kategori->nama_kategori }}" class="form-control" required="">
                                      @if($errors->has('name'))
                                      <small class="form-text text-danger">*{{ $errors->first('name') }}</small>
                                      @endif
                                  </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="phone-name" class=" form-control-label">Logo</label>
                                </div>
                                <div class="col col-md-9">
                                  <img id="blah" src="{{ asset('images/logo/'.$kategori->logo) }}" class="img-fluid"/>
                                  <input type="file" id="imgInp" name="logo" class="form-control-file">
                                  @if($errors->has('logo'))
                                  <small class="form-text text-danger">*{{ $errors->first('logo') }}</small>
                                  @endif
                                </div>
                              </div>
                      </div>
                      <div class="card-footer text-center">
                          <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg">
                              <i class="fa fa-dot-circle-o"></i> Update Category
                          </button>
                          </form>
                      </div>
                    </form>
                </div>
            </div>
          </form>
      </div>
</div>
@endsection
