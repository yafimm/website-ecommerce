@extends('template-admin.template')
@section('content')
    @include('_partial.flash_message')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">List Product</h2>
                <a href="{{ route('produk.create') }}" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>add product</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
      @foreach($all_produk as $produk)
      <div class="col-md-4 col-sm-6 col-12">
          <div class="card">
              <img style="width: auto; max-height: 400px; min-height: 300px;" class="card-img-top" src="{{ asset('images/produk/'. $produk->gambar1) }}" alt="Card image cap">
              <div class="card-body">
                  <h4 class="card-title mb-3 text-center">{{ $produk->nama }}</h4>
                  <p class="card-text">{{ $produk->deskripsi }}</p>
              </div>
              <div class="card-footer">
                  <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary">
                    <i style="font-size: 24px;" class="zmdi zmdi-edit"></i>
                  </a>
                  <a href="{{ route('produk.destroy', $produk->id) }}" class="btn btn-danger"  onclick="event.preventDefault();
                  document.getElementById('produk-delete-{{ $produk->id }}').submit();"><i style="font-size: 24px;" class="zmdi zmdi-delete"></i></a>

                  <form class="" id="produk-delete-{{ $produk->id }}" action="{{ route('produk.destroy', $produk->id) }}" method="post">
                      @method('DELETE')
                      @CSRF
                  </form>
              </div>
          </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
      {{ $all_produk->links() }}
    </div>
@endsection
