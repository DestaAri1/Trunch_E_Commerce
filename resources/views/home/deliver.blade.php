@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Pengiriman
          </h2>
        </div>
        @if (count($deliver) == 0)
        <div class="text-center bold">Maaf anda tidak barang yang sedang dikirm</div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="75px">No.</th>
                        <th width="150px">Gambar</th>
                        <th width="250px">Nama Produk</th>
                        <th width="100px">Jumlah</td>
                        <th width="150px">Harga</th>
                        <th width="150px">Sub Harga</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($deliver as $d)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>
                            <img src="assets/img/{{ $d->img }}" class="img-fluid" alt="Responsive image">
                        </td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->quantity }}</td>
                        <td>Rp. {{ $d->price }}</td>
                        <td>Rp. {{ $d->sub_price }}</td>
                        @if (empty($d->status))
                        <td>Belum Dikirim</td>
                        <td></td>
                        @else
                        <td>Sedang Dikirim</td>
                        <td>
                            <form action="{{ route('selesai', $d->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="name" id="name">
                                <button type="submit" name="submit" class="btn btn-primary">Selesai</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
            </table>
        </div>
        @endif
    </div>
</section>
@endsection
