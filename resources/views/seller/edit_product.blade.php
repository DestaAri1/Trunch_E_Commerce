@extends('seller.master')

@section('judul_halaman', 'Halaman Edit Buku')

@section('konten')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Buku</h1>
</div>
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- {{method_field('PATCH')}} --}}
                    @method('PATCH')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nama Produk</label>
                            <input name="name" id="name" type="text" class="form-control" value="{{ $produk->name }}" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Slug</label>
                            <input name="slug" id="slug" type="text" class="form-control" value="{{ $produk->slug }}" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-row text-center">
                        <div class="form-group col-md-4">
                            <label for="">Harga</label>
                            <input name="price" id="price" type="number" class="form-control" value="{{ $produk->price }}" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Stok</label>
                            <input name="stock" id="stock" type="number" class="form-control" value="{{ $produk->stock }}" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Gambar</label>
                            <input name="img" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('list') }}" class="btn btn-close-white">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
