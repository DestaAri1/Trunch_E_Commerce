@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Transaction
          </h2>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width="75px">No.</th>
                            <th width="150px">Picture</th>
                            <th width="250px">Product Name</th>
                            <th>Quantity</td>
                            <th width="200px">Price</th>
                            <th width="200px">Sub Price</th>
                            <th width="100px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $o)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="assets/img/{{ $o->img }}" class="img-fluid" alt="Responsive image">
                                    <input type="hidden" name="img[]" id="img[]" value="{{ $o->img }}">
                                </td>
                                <td>
                                    {{ $o->name }}
                                    <input type="hidden" name="name[]" value="{{ $o->name }}">
                                </td>
                                <td>
                                    {{ $o->quantity }}
                                    <input type="hidden" name="quantity[]" value="{{ $o->quantity }}">
                                </td>
                                <td>
                                    {{ $o->price }}
                                    <input type="hidden" name="price[]" value="{{ $o->price }}">
                                </td>
                                <td>
                                    @php
                                        $total_harga = 0;
                                        $total_harga = ($o->price) * ($o->quantity);
                                    @endphp
                                    {{ ($o->price) * ($o->quantity) }}
                                    <input type="hidden" name="sub_price" value="{{ $total_harga }}">
                                </td>
                                <td>
                                    <form action="#">
                                        <button class="btn btn-primary" type="submit" name="submit">Pay</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success pull-right" type="submit" name="submit">Pay All</button>
            </div>
        </form>
    </div>
</section>
@endsection
