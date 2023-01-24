@extends('home.master1')

@section('konten')
<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Product List
        </h2>
      </div>
      <div class="row">
        @foreach ($produk as $p)
        <div class="col-sm-6 col-lg-4">
            <div class="box">
              <div class="img-box">
                <img src="assets/img/{{ $p->img }}" alt="{{ $p->name }}">
                <a href="" class="add_cart_btn">
                  <span>
                    Add To Cart
                  </span>
                </a>
              </div>
              <div class="detail-box">
                <h5>
                  {{ $p->name }}
                </h5>
                <div class="product_info">
                  <h5>
                    <span>Rp.</span> {{ $p->price }}
                  </h5>
                  <div class="star_container">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="btn_box">
        {{ $produk->links() }}
      </div>
    </div>
</section>
@endsection
