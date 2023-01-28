@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Transaksi
          </h2>
        </div>
        @if (count($order) == 0)
        <div class="text-center">Anda Tidak Memiliki Barang untuk Dibayar</div>
        @else
        <form action="{{ route('bayar') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width="75px">No.</th>
                            <th width="150px">Gambar</th>
                            <th width="250px">Nama Produk</th>
                            <th>Jumlah</td>
                            <th width="200px">Harga</th>
                            <th width="200px">Sub Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $o)
                            <tr style="text-align:center">
                                <td>{{ $no++ }}</td>
                                <td><img src="assets/img/{{ $o->img }}" class="img-fluid" alt="Responsive image">
                                    <input type="hidden" name="img[]" id="img[]" value="{{ $o->img }}">
                                </td>
                                <td>
                                    {{ $o->name }}
                                    <input type="hidden" name="name[]" id="name[]" value="{{ $o->name }}">
                                </td>
                                <td>
                                    {{ $o->quantity }}
                                    <input type="hidden" name="quantity[]" id="quantity[]" value="{{ $o->quantity }}">
                                </td>
                                <td>
                                    {{ $o->price }}
                                    <input type="hidden" name="price[]" id="price[]" value="{{ $o->price }}">
                                </td>
                                <td>
                                    @php
                                        $total_harga = 0;
                                        $total_harga = ($o->price) * ($o->quantity);
                                    @endphp
                                    {{ $total_harga }}
                                    <input type="hidden" name="sub_price[]" id="sub_price[]" value="{{ $total_harga }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success pull-right" type="submit" name="submit">Bayar</button>
            </div>
        </form>
        @endif
    </div>
</section>
@endsection
