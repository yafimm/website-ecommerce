@extends('template.template')
@section('content')
<!--================Category Product Area =================-->
<section class="section_gap">
		<div class="container">
      <div class="row">
        @foreach($all_kategori as $kategori)
        <div class="col-md-3 col-sm-4 col-6">
          <a href="{{ route('produk.index_produk_kategori', $kategori->slug) }}" class="item mx-auto">
            <img class="img-fluid" src="{{ asset('images/logo/'.$kategori->logo) }}" alt="">
          </a>
        </div>
        @endforeach
      </div>
    </div>
	</section>
	<!--================End Category Product Area =================-->
@endsection
