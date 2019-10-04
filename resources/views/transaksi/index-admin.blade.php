@extends('template-admin.template')
@section('content')
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35 text-center">List Phones Category</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="font-size: 16px;">ID Order</th>
                                                <th style="font-size: 16px;">Customer Name</th>
                                                <th style="font-size: 16px;" class="text-center">Proof</th>
                                                <th style="font-size: 16px;">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td style="vertical-align: middle; font-size: 16px;">1</td>
                                                <td style="color: black;  font-size: 16px;">Lori Lynch</td>
                                                <td style="color: black;  font-size: 16px;">Rp. 1.040.000,00</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                                        View Receipt of Transfer
                                                    </button>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button style="width: 50px; height: 50px;" class="item" data-toggle="tooltip" data-placement="top" title="Confirm">
                                                            <i style="font-size: 26px; color: black;" class="zmdi zmdi-check"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                                <td style="vertical-align: middle; font-size: 16px;">1</td>
                                                <td style="color: black;  font-size: 16px;">Lori Lynch</td>
                                                <td style="color: black;  font-size: 16px;">Rp. 1.040.000,00</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                                                        View Receipt of Transfer
                                                    </button>
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button style="width: 50px; height: 50px;" class="item" data-toggle="tooltip" data-placement="top" title="Confirm">
                                                            <i style="font-size: 26px; color: black;" class="zmdi zmdi-check"></i>
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
                        </div>
@endsection
