@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Keranjang Belanja
          </h2>
        </div>
        @if (count($cart) == 0)
        <div class="text-center bold">Maaf anda tidak memiliki list belanjaan</div>
        @else
        <form action="{{ route('checkout') }}" method="POST">
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
                            <th width="100px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($cart as $c)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="assets/img/{{ $c->img }}" class="img-fluid" alt="Responsive image">
                                    <input type="hidden" name="img[]" id="img[]" value="{{ $c->img }}">
                                </td>
                                <td>
                                    {{ $c->name }}
                                    <input type="hidden" name="name[]" id="name[]" value="{{ $c->name }}">
                                </td>
                                <td>
                                    <input class="form-control" style="width:90px; float:left" type="number" value="1" min="1" name="quantity[]" id="quality[]">
                                </td>
                                <td>
                                    {{ $c->price }}
                                    <input type="hidden" name="price[]" id="price[]" value="{{ $c->price }}">
                                </td>
                                <td>
                                    <a href="{{ route('hapus_cart', $c->id) }}" class="btn btn-danger text-center">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success pull-right" type="submit" name="submit">Check Out</button>
            </div>
        </form>
        @endif
    </div>
</section>
@endsection
