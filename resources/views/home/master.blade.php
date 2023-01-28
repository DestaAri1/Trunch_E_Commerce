<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{ asset('style1/images/fevicon.png') }}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Trunch</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('style1/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="{{ asset('style1/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('style1/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('style1/css/responsive.css') }}" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>
                    Call : +01 123455678990
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span>
                    Email : trunch@gmail.com
                  </span>
                </a>
              </div>
            <form class="search_form">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
            <div class="user_option_box">
              <a href="{{ route('cart') }}" class="cart-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>
                  @if (Auth::check())
                    @if (count($cart) > 0)
                    Cart <sup class="circle">{{ count($cart) }}</sup>
                    @else
                    Cart
                    @endif
                  @else
                  Cart
                  @endif
                </span>
              </a>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ route('home') }}">
              <span>
                Trunch
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('produk') }}">Products</a>
                </li>
                </li>
                <li class="nav-item">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="nav-link btn btn-danger rounded-pill">Sign In/Up</a>
                            @endif
                        @else
                            @if (Auth::user()->level == 'seller')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-item collapsed">
                                            <a class="fa fa-fw fa-user" href="#">
                                                Profil
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a class="fa fa-dashboard fa-sm fa-fw mr-2" href="{{ route('seller') }}">
                                                Dashboard
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a class="fa fa-archive fa-sm fa-fw mr-2" href="{{ route('transaksi') }}">
                                                @if (Auth::check())
                                                @if (count($trans) > 0)
                                                Transaksi <sup class="circle">{{ count($trans) }}</sup>
                                                @else
                                                Transaksi
                                                @endif
                                            @else
                                            Transaksi
                                            @endif
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a href="{{ route('deliver') }}" class="fa fa-send fa-fw">
                                                @if (count($deliver) > 0)
                                                Pengiriman <sup class="circle">{{ count($deliver) }}</sup>
                                                @else
                                                Pengiriman
                                                @endif
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a href="{{ route('history') }}" class="fa fa-list fa-fw">
                                                History
                                            </a>
                                        </div>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item fa fa-arrow-right" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::user()->level == 'user')
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="dropdown-item collapsed">
                                            <a class="fa fa-fw fa-user" href="{{ route('profile') }}">
                                                Profil
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a class="fa fa-archive fa-fw" href="{{ route('transaksi') }}">
                                                @if (Auth::check())
                                                    @if (count($trans) > 0)
                                                    Transaksi <sup class="circle">{{ count($trans) }}</sup>
                                                    @else
                                                    Transaksi
                                                    @endif
                                                @else
                                                Transaksi
                                                @endif
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a href="{{ route('deliver') }}" class="fa fa-send fa-fw">
                                                @if (count($deliver) > 0)
                                                Pengiriman <sup class="circle">{{ count($deliver) }}</sup>
                                                @else
                                                Pengiriman
                                                @endif
                                            </a>
                                        </div>

                                        <div class="dropdown-item">
                                            <a href="{{ route('history') }}" class="fa fa-list fa-fw">
                                                History
                                            </a>
                                        </div>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                    @endguest
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('style1/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('style1/images/slider-img.png') }} " alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quam velit saepe dolorem deserunt quo quidem ad optio.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{ asset('style1/images/slider-img.png') }}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn_box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- product section -->

  @yield('konten')

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Trunch
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              Address
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +01 1234567890
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              demo@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Eligendi sunt, provident, debitis nemo, facilis cupiditate velit libero dolorum aperiam enim nulla iste maxime corrupti ad illo libero minus.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="index.html">
                  Home
                </a>
              </li>
              <li>
                <a href="about.html">
                  About
                </a>
              </li>
              <li>
                <a href="product.html">
                  Products
                </a>
              </li>
              <li>
                <a href="why.html">
                  Why Us
                </a>
              </li>
              <li>
                <a href="testimonial.html">
                  Testimonial
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ asset('style1/js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('style1/js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('style1/js/custom.js') }}"></script>
</body>

</html>
