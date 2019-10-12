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
                @if(!$all_transaksi->isEmpty())
                @foreach($all_transaksi as $key => $transaksi)
                <tr class="tr-shadow">
                    <td>{{ $transaksi->id }}</td>
                    <td>{{ $transaksi->user->username }}</td>
                    <td>Rp. {{ helper_money_format($transaksi->subtotal + $transaksi->ongkir) }}</td>
                    <td>{{ $transaksi->created_at->format('d M Y') }}</td>
                    <td class="{{ ($transaksi->status == 'Unpaid') ? 'text-danger' : 'text-success' }}">{{ $transaksi->status }}</td>
                    <td>
                       @if($transaksi->status === 'Unpaid' || $transaksi->status === 'Is being sent')
                        <div class="table-data-feature">
                                <a href="#" class="item" data-toggle="tooltip" data-placement="top" onclick="event.preventDefault();
                                document.getElementById('transaksi-update-{{ $transaksi->id }}').submit();">
                                    <i class="zmdi zmdi-check"></i>
                                </a>
    
                                <form class="" id="transaksi-update-{{ $transaksi->id }}" action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                                    @method('put')
                                    @CSRF
                                </form>
                        </div>
                       @endif
                    </td>
                </tr>
                <tr class="spacer"></tr>
                @endforeach
                @endif
              </tbody>
          </table>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      {{ $all_transaksi->links() }}
    </div>
@endsection
