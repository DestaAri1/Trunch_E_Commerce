@extends('seller.master')

@section('konten')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">
            <button class="btn btn-success" data-toggle="modal" data-target="#tambah_produk">Tambah Produk</button>
        </h1>
    </div>

    <div class="container-fluid">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary pl-2">List Produk</h6>
        </div>
        <div class="card-body">
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
            <div>

            <div class="table-responsive">
                <table class="table table-bordered overflow-auto" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center">
                            <th width="50px">No</th>
                            <th>Gambar</th>
                            <th width="250px">Nama</th>
                            <th width="85px">Stok</th>
                            <th width="175px">Harga</th>
                            <th width="100px">&nbsp;</th>
                            <th width="100px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($produk as $p)
                        <tr>
                            <td style="text-align: center">{{ $no++ }}</td>
                            <td>
                                <img src="/assets/img/{{ $p->img }}" class="img-fluid" alt="">
                            </td>
                            <td>{{ $p->name }}</td>
                            <td style="text-align: center">{{ $p->stock }}</td>
                            <td style="text-align: center">Rp. {{ $p->price }}</td>
                            <td>
                                <form action="{{ route('edit_produk', $p->id) }}" class="text-center" method="GET">
                                    <button class="btn btn-facebook" style="align-items: center">Update</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('hapus_produk', $p->id) }}" class="text-center" method="POST">
                                    @csrf
                                    {{ method_field('post') }}
                                    <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nama Produk</label>
                            <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan Nama Produk" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Slug</label>
                            <input name="slug" id="slug" type="text" class="form-control" placeholder="Masukkan Slug" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Harga</label>
                            <input name="price" id="price" type="number" class="form-control" placeholder="Masukkan Harga" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Stok</label>
                            <input name="stock" id="stock" type="number" class="form-control" placeholder="Masukkan Stok" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Gambar</label>
                            <input name="img" type="file" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
