<div class="card-body card-block">
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="product-name" class=" form-control-label">Product Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="nama" class="form-control" required="" value="{{ old('nama', $produk->nama) }}">
                @if($errors->has('nama'))
                  <small class="form-text text-danger">*{{ $errors->first('nama') }}</small>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="product-name" class=" form-control-label">Price</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="harga" class="form-control" required="" value="{{ old('harga', $produk->harga) }}">
                @if($errors->has('harga'))
                  <small class="form-text text-danger">*{{ $errors->first('harga') }}</small>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="product-stock" class=" form-control-label">Stok</label>
            </div>
            <div class="col-12 col-md-9">
                <input style="width: auto !important;" type="number" id="product-stock" name="stok" min="1" max="1000" value="{{ old('stok', $produk->stok) }}" class="form-control" required="">
                @if($errors->has('stok'))
                  <small class="form-text text-danger">*{{ $errors->first('stok') }}</small>
                @endif
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <label for="description" class=" form-control-label">description</label>
            </div>
            <div class="col-12 col-md-9">
                <textarea name="deskripsi" id="textarea-input" rows="9" class="form-control">{{ $produk->deskripsi }}</textarea>
                @if($errors->has('deskripsi'))
                  <small class="form-text text-danger">*{{ $errors->first('deskripsi') }}</small>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="category" class=" form-control-label">Phone Category</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="id_kategori" id="select" class="form-control">
                    <option value="" disabled>Please select</option>
                    @foreach($all_kategori as $kategori)
                      <option value="{{ $kategori->id }}" {{ ($produk->id_kategori == $kategori->id) ? 'select' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_kategori'))
                  <small class="form-text text-danger">*{{ $errors->first('id_kategori') }}</small>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="images-1" class=" form-control-label">Product Image</label>
            </div>
            <div class="col-12 col-md-6">
              <img id="blah" src="{{ asset('images/produk/'. $produk->gambar1) }}" class="img-fluid"/>
              <input type="file" id="imgInp" name="gambar1" class="form-control-file">
              @if($errors->has('gambar1'))
                <small class="form-text text-danger">*{{ $errors->first('gambar1') }}</small>
              @endif
            </div>
        </div>
</div>
<div class="card-footer text-center">
    <button style="width: 100%;" type="submit" class="btn btn-primary btn-lg">
        <i class="fa fa-dot-circle-o"></i> Submit
    </button>
</div>
