@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
          <h2>
            History
          </h2>
        </div>
        @if (count($history) == 0)
        <div class="text-center bold">Maaf anda tidak memiliki history</div>
        @else
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="75px">No.</th>
                        <th width="150px">Gambar</th>
                        <th width="250px">Nama Produk</th>
                        <th width="100px">Jumlah</td>
                        <th width="200px">Harga Total</th>
                        <th width="120px">Jam</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($history as $h)
                    <tr class="text-center">
                        <td>{{ $no++ }}</td>
                        <td>
                            <img src="assets/img/{{ $h->img }}" class="img-fluid" alt="{{ $h->name }}">
                        </td>
                        <td>{{ $h->name }}</td>
                        <td>{{ $h->quantity }}</td>
                        <td>Rp. {{ $h->sub_price }}</td>
                        <td>{{ $h->waktu }}</td>
                        <td>{{ $h->created_at }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        @endif
    </div>
</section>
@endsection
