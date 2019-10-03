@extends('template-admin.template')
@section('content')
<div class="row">
                            <div class="col-md-6">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35 text-center">List Phones Category</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>1</td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>1</td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td>1</td>
                                                <td>Lori Lynch</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
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
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="phone-name" class=" form-control-label">Phone Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="phone-name" name="product-name" placeholder="New Phone Name" class="form-control" required="">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection