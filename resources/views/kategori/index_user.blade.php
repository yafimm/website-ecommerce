@extends('template.template')
@section('content')
<!--================Category Product Area =================-->
<section class="section_gap">
		<div class="container">
      <div class="row">
        @foreach($all_kategori as $kategori)
        <div class="col-md-3 col-sm-4 col-6" style="margin-bottom: 10px;">
          <a href="{{ route('produk.index_produk_kategori', $kategori->slug) }}" class="item mx-auto">
            <center>
              <img style="max-height: 100px; padding-top: 10px; padding-bottom: 10px;" class="img-fluid img-category" src="{{ asset('images/logo/'.$kategori->logo) }}" alt="">
            </center>
          </a>
        </div>
        @endforeach
      </div>
    </div>
	</section>
	<!--================End Category Product Area =================-->
@endsection
