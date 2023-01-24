@extends('home.master')

@section('konten')

<section class="product_section">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
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
      </div>
      <div class="row">
        @foreach ($produk as $p)
        <div class="col-sm-6 col-lg-4">
            <div class="box">
              <div class="img-box">
                <img src="/assets/img/{{ $p->img }}" alt="{{ $p->name }}">
              </div>
              <div class="detail-box">
                <h5>
                  {{ $p->name }}
                </h5>
                <div class="product_info">
                  <h5>
                    <span>Rp</span> {{ $p->price }}
                  </h5>
                  <div class="star_container">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                </div>
                <form action="{{ route('add_cart', $p->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="name" value="{{ $p->name }}">
                    <button type="submit" name="submit" class="btn btn-primary">Pesan</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="btn_box">
        <a href="{{ route('produk') }}" class="view_more-link">
          View More
        </a>
      </div>
    </div>
    <br>
  </section>

  <!-- end product section -->

  <!-- about section -->

  <section class="about_section">
    <div class="container-fluid  ">
      <div class="row">
        <div class="col-md-5 ml-auto">
          <div class="detail-box pr-md-3">
            <div class="heading_container">
              <h2>
                We Provide Best For You
              </h2>
            </div>
            <p>
              Totam architecto rem beatae veniam, cum officiis adipisci soluta perspiciatis ipsa, expedita maiores quae accusantium. Animi veniam aperiam, necessitatibus mollitia ipsum id optio ipsa odio ab facilis sit labore officia!
              Repellat expedita, deserunt eum soluta rem culpa. Aut, necessitatibus cumque. Voluptas consequuntur vitae aperiam animi sint earum, ex unde cupiditate, molestias dolore quos quas possimus eveniet facilis magnam? Vero, dicta.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <div class="img-box">
            <img src="{{ asset('style1/images/about-img.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- why us section -->

  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{ asset('style1/images/w1.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{ asset('style1/images/w2.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box ">
            <div class="img-box">
              <img src="{{ asset('style1/images/w3.png') }}" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->

@endsection
