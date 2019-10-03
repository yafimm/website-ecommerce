@extends('template-admin.template')
@section('content')
@include('_partial.flash_message')
<div class="row">
                            <div class="col-md-6">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35 text-center">List Phones Category</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Logo</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($all_kategori as $key => $kategori)
                                          <tr class="tr-shadow">
                                              <td>{{ $key + 1 }}</td>
                                              <td><img src="{{ asset('images/logo/'. $kategori->logo)}}" class="img-fluid" alt=""></td>
                                              <td>{{ $kategori->nama_kategori }}</td>
                                              <td>
                                                  <div class="table-data-feature">
                                                      <a href="{{ route('kategori.edit', $kategori->id) }}" class="item" data-toggle="tooltip" data-placement="top">
                                                        <i style="font-size: 24px;" class="zmdi zmdi-edit"></i>
                                                      </a>
                                                      <a href="{{ route('kategori.destroy', $kategori->id) }}" class="item" data-toggle="tooltip" data-placement="top"  onclick="event.preventDefault();
                                                      document.getElementById('kategori-delete-{{ $kategori->id }}').submit();"><i style="font-size: 24px;" class="zmdi zmdi-delete"></i></a>

                                                      <form class="" id="kategori-delete-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori->id) }}" method="post">
                                                          @method('DELETE')
                                                          @CSRF
                                                      </form>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr class="spacer"></tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                            <div class="col-md-6">
                                <h3 class="title-5 m-b-35 text-center">Add New Category</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="color: #e5e5e5;">id</th>
                                                <th style="color: #e5e5e5;">name</th>
                                                <th style="color: #e5e5e5;">action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card">
                                    <form class="" action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                                      @CSRF
                                      @method('post')
                                      <div class="card-body card-block">
                                          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                              <div class="row form-group">
                                                  <div class="col col-md-3">
                                                      <label for="phone-name" class=" form-control-label">Category Name</label>
                                                  </div>
                                                  <div class="col-12 col-md-9">
                                                      <input type="text" id="phone-name" name="name" placeholder="Category name" class="form-control" required="">
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
                                                  <img id="blah" src="" class="img-fluid"/>
                                                  <input type="file" id="imgInp" name="logo" class="form-control-file">
                                                  @if($errors->has('logo'))
                                                  <small class="form-text text-danger">*{{ $errors->first('logo') }}</small>
                                                  @endif
                                                </div>
                                              </div>
                                      </div>
                                      <div class="card-footer text-center">
                                          <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg">
                                              <i class="fa fa-dot-circle-o"></i> Add Category
                                          </button>
                                          </form>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endsection
