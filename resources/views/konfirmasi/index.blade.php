@extends('template-admin.template')
@section('content')

<div class="row">
  @include('_partial.flash_message')
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35 text-center">List Phones Category</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th style="font-size: 16px;">ID Order</th>
                                                <th style="font-size: 16px;" class="text-center">Customer Name</th>
                                                <th style="font-size: 16px;" class="text-center">Receipt</th>
                                                <th style="font-size: 16px;">Date</th>
                                                <th style="font-size: 16px;" class="text-center">Status</th>
                                                <th style="font-size: 16px;">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($all_konfirmasi as $key => $konfirmasi)
                                          <tr class="tr-shadow">
                                              <td style="vertical-align: middle; font-size: 16px;">{{ $konfirmasi->id }}</td>
                                              <td style="color: black;  font-size: 16px;">{{ $konfirmasi->user->username }}</td>
                                              <td class="text-center"><img style="width: 250px; height: auto; max-height: 500px;" src="{{ asset('images/bukti/'. $konfirmasi->bukti) }}"></td>
                                              <td class="text-center">{{ $konfirmasi->created_at->format('d M Y H:m') }}</td>
                                              <td class="text-center">{{ $konfirmasi->status }}</td>
                                              <td>
                                                  @if($konfirmasi->status === 'Open')
                                                    <div class="table-data-feature">
                                                            <a href="#" class="item" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault();
                                                            document.getElementById('konfirmasi-update-{{ $konfirmasi->id }}').submit();">
                                                                <i class="zmdi zmdi-check"></i>
                                                            </a>
                                
                                                            <form class="" id="konfirmasi-update-{{ $konfirmasi->id }}" action="{{ route('konfirmasi.update', $konfirmasi->id) }}" method="post">
                                                                @method('put')
                                                                @CSRF
                                                            </form>
                                                    </div>
                                                   @endif
                                              </td>
                                          </tr>
                                          <tr class="spacer"></tr>

                                          @endforeach
                                        </tbody>
                                        <div class="d-flex justify-content-center">
                                          {{ $all_konfirmasi->links() }}
                                        </div>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
@endsection
