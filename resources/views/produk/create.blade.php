@extends('template-admin.template')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12">
          <div class="card">
              <div class="card-header text-center">
                  <h1>
                      <strong>Add This Product</strong>
                  </h1>
              </div>
          </div>
          <form class="" action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
            @CSRF
            @method('post')
            @include('produk.form')
          </form>
      </div>
</div>
@endsection
