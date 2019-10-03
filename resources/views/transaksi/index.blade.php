@extends('template-admin.template')
@section('content')
    @include('_partial.flash_message')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">List Transaksi</h2>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
      <div class="table-responsive table-responsive-data2">
          <table class="table table-data2">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($all_transaksi as $key => $transaksi)
                <tr class="tr-shadow">
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->user->username }}</td>
                    <td>{{ $transaksi->subtotal + $transaksi->ongkir }}</td>
                    <td>{{ $transaksi->created_at->format('d M Y') }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>
                        <div class="table-data-feature">
                            <a href="{{ route('transaksi.update', $transaksi->id) }}" class="item" data-toggle="tooltip" data-placement="top"  onclick="event.preventDefault();
                            document.getElementById('transaksi-update-{{ $transaksi->id }}').submit();"><i style="font-size: 24px;" class="zmdi zmdi-delete"></i></a>

                            <form class="" id="transaksi-transaksi-{{ $transaksi->id }}" action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                                @method('put')
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
    </div>
    <div class="d-flex justify-content-center">
      {{ $all_transaksi->links() }}
    </div>
@endsection
