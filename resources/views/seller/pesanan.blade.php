@extends('seller.master')

@section('konten')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pesanan</h1>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary pl-2">Pesanan</h6>
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
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr style="text-align: center">
                        <th width="50px">No</th>
                        <th width="150px">Gambar</th>
                        <th width="150px">Nama Produk</th>
                        <th width="100px">Jumlah</th>
                        <th width="200px">Alamat</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($deliver as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img src="/assets/img/{{ $d->img }}" class="img-fluid" alt="{{ $d->name }}">
                        </td>
                        <td>{{ $d->name }}</td>
                        <td class="text-center">{{ $d->quantity }}</td>
                        <td>{{ $d->address }}</td>
                        @if (empty($d->status))
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Belum Dikirm
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('upd_pesanan', $d->id) }}">Kirim</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">Tolak</button>
                        </td>
                        @else
                        <td colspan="2"><p>Menunggu Konfirmasi Selesai Dari Pemesan</p></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection
