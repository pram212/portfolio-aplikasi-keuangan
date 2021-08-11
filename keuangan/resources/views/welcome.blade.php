<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Portofolio &mdash; Web App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('webApp/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{url('https://i.icomoon.io/public/temp/0448aa766e/UntitledProject/style.css')}}">
  <link rel="stylesheet" href="{{asset('webApp/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('webApp/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('webApp/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('webApp/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('webApp/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('webApp/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('webApp/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('webApp/fonts/flaticon/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('webApp/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('webApp/css/style.css')}}">
  

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="{{url('/')}}" class="mb-0">Pramono<span class="text-primary">.</span> </a></div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li class="has-children">
                  <a href="#features-section" class="nav-link">Fitur</a>
                  <ul class="dropdown">
                    <li><a href="#transaksi" class="nav-link">Transaksi</a></li>
                    <li><a href="#laporan" class="nav-link">Laporan</a></li>
                    <li><a href="#dasbor" class="nav-link">Dasbor</a></li>
                    <li class="has-children">
                      <a href="#">Coming Soon</a>
                      <ul class="dropdown">
                        <li><a href="#">Fitur Jurnal Umum</a></li>
                        <li><a href="#">Fitur Penjualan</a></li>
                        <li><a href="#">Fitur Pembelian</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#teknologi" class="nav-link">Teknologi</a></li>
                <li><a href="#motto" class="nav-link">Motto</a></li>
                <li><a href="#contact-section" class="nav-link">Kontak</a></li>

                <li class="social"><a href="https://web.facebook.com/framono.torres/" class="nav-link" target="_blank"><span class="icon-facebook"></span></a></li>
                <li class="social"><a href="https://www.instagram.com/pram0n0_/?hl=en" class="nav-link" target="_blank"><span class="icon-instagram"></span></a></li>
                <li class="social"><a href="https://github.com/pram212/portfolio-aplikasi-keuangan/tree/main/keuangan" class="nav-link" target="_blank"><span class="icon-github"></span></a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

        </div>
      </div>

    </header>



    <div class="site-section hero" id="home-section">
      <div class="container text-center">
        <div class="row justify-content-center text-center">
          <div class="col-lg-10">
            <div class="mb-5">
              <h1 class="hero-heading">Aplikasi Keuangan Berbasis <strong>Web</strong></h1>
              <p>Dibuat dengan menggunakan Laravel versi 6</p>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Dasbor</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            </div>
            <img src="{{asset('images/preview.png')}}" alt="image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    
    
    <div class="site-section pt-0" id="features-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <span class="subtitle-1">Fitur</span>
            <h2 class="section-title-1 font-weight-bold">Fitur-Fitur Yang Tersedia</h2>
          </div>
        </div>
        <div class="row align-items-center mb-5">
          <div class="col-lg-6 mb-5 order-lg-2 mb-lg-0" data-aos="fade-right">
            <img src="{{asset('images/keuangan-2.png')}}" alt="Image" class="img-fluid img-shadow">
          </div>
          <div class="col-lg-5 mr-auto">
            <div class="mb-4" id="transaksi">
              <h2 class="section-title-2">Transaksi</h2>
              <p>Fitur yang berfungsi untuk mengelola transaksi keuangan. Transaksi merupakan fitur utama dalam aplikasi keuangan sederhana ini. Segalaproses transaksi dapat dilakukan dalam fitur ini.</p>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-users"></span>
              <div>
                <h3>CRUD</h3>
                <p>User dapat menambah, mengubah, melihat, dan menghapus data transaksi.</p>
              </div>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-layers"></span>
              <div>
                <h3>Lainnya</h3>
                <p>Pencarian dan pagination system</p>
              </div>
            </div>

          </div>
        </div>

        <div class="row align-items-center" id="laporan">
          <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-left">
            <img src="{{asset('images/keuangan-3.png')}}" alt="Image" class="img-fluid img-shadow">
          </div>
          <div class="col-lg-5 order-lg-1 ml-auto">
            <div class="mb-4">
              <h2 class="section-title-2">Laporan Transaksi</h2>
              <p>Fitur ini berguna untuk membuat laporan transaksi yang dapat dengan bebas dikustomisasi berdasarkan waktu dan kategori transaksi.</p>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-cog"></span>
              <div>
                <h3>Print</h3>
                <p>Laporan transaksi dapat diprint langsung melalui browser.</p>
              </div>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-bolt"></span>
              <div>
                <h3>Export Excel</h3>
                <p>Laporan transaksi juga dapat diexport ke dalam format excel.</p>
              </div>
            </div>

          </div>
        </div>

        <div class="row align-items-center mb-5" id="dasbor">
          <div class="col-lg-6 mb-5 order-lg-2 mb-lg-0" data-aos="fade-right">
            <img src="{{asset('images/keuangan-1.png')}}" alt="Image" class="img-fluid img-shadow">
          </div>
          <div class="col-lg-5 mr-auto">
            <div class="mb-4">
              <h2 class="section-title-2">Dasbor</h2>
              <p>Menampilkan data ringkasan transaksi per bulan saat ini. dilengkapi dengan widget dan grafik.</p>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-users"></span>
              <div>
                <h3>Widget</h3>
                <p>Ringkasan total transaksi, total pemasukan, dan total pengeluaran bulan ini.</p>
              </div>
            </div>

            <div class="d-flex feature-v1">
              <span class="wrap-icon icon-layers"></span>
              <div>
                <h3>Grafik</h3>
                <p>Grafik <em>Pie</em> yang berisi perbandingan antara total pemasukan dan pengeluaran. Dan juga grafik <em>Bar</em> yang menampilkan perbandingan pemasukan dan pengeluaran berdasarkan kategori.</p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

    <div class="site-section" id="teknologi">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-5 mx-auto">
            <span class="subtitle-1">Teknologi</span>
            <h2 class="section-title-1 font-weight-bold">Bahasa dan Framework</h2>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="0">
            <div class="feature-v2">
                <span class="icon-html5 bg-light border"></span>
                <h3 class="text-primary">HTML5</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-v2">
                <span class="icon-css31 bg-light border"></span>
                <h3 class="text-primary">CSS</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-v2">
                <span class="icon-javascript bg-light border"></span>
                <h3 class="text-primary">Javascript</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-v2">
                <span class="icon-php bg-light border"></span>
                <h3 class="text-primary">PHP</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-v2">
                <span class="icon-mysql bg-light border"></span>
                <h3 class="text-primary">Mysql</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-v2">
                <span class="icon-jquery bg-light border"></span>
                <h3 class="text-primary">jQuery</h3>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="0">
            <div class="feature-v2">
                <span class="icon-bootstrap bg-light border"></span>
                <h3 class="text-primary">Bootstrap</h3>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-4 col-lg-2 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-v2">
                <span class="icon-laravel bg-light border"></span>
                <h3 class="text-primary">Laravel</h3>
            </div>
          </div>
      </div>
    </div>

    <div class="site-section bg-light testimonial-wrap" id="motto">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <span class="subtitle-1">Motto</span>
            <h2 class="section-title-1 font-weight-bold">Web Programming</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
        <div>
          <div class="testimonial">

            <blockquote class="mb-5">
              <p>&ldquo;Programming memang tidak mudah untuk dipahami akan tetapi bagi Saya programming itu menarik. Ibarat orang makan <em>sambel</em> terasa pedas di lidah, namun terus ketagihan.&rdquo;</p>
            </blockquote>

            <figure class="mb-4 d-flex align-items-center justify-content-center">
              <p>Pramono</p>
            </figure>
          </div>
        </div>
        <div>
          <div class="testimonial">

            <blockquote class="mb-5">
              <p>&ldquo;Saya akan terus membuat karya-karya menarik seputar web programming untuk semakin meningkatkan kemampuan Saya.&rdquo;</p>
            </blockquote>
            <figure class="mb-4 d-flex align-items-center justify-content-center">
              <p>Pramono</p>
            </figure>

          </div>
        </div>

        <div>
          <div class="testimonial">
            <blockquote class="mb-5">
              <p>&ldquo;Semoga suatu saat dapat dipercaya oleh perusahaan untuk bekerja sebagai web developer.&rdquo;</p>
            </blockquote>
            <figure class="mb-4 d-flex align-items-center justify-content-center">
              <p>Pramono</p>
            </figure>
          </div>
        </div>
    </div>

    <div class="site-section pb-0 bg-light" id="contact-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <span class="sub-title">Kontak</span>
            <h2 class="font-weight-bold text-black">Hubungi Saya</h2>
          </div>
        </div>

        <div class="row mb-5">



          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-room d-block h2 text-primary"></span>
              <span>
                    <a href="https://www.google.com/maps/place/Puskopad+%E2%80%9CA%E2%80%9D+Dam+Jaya/@-6.2917775,106.8122557,19z/data=!3m1!4b1!4m5!3m4!1s0x2e69f1f977d1ff71:0x4a3e5aa0ad618757!8m2!3d-6.2917788!4d106.8128029" target="_blank">
                    Jl. Tb Simatupang No. 72, Cilandak Timur, Pasar Minggu, Jakarta Selatan
                </a>
              </span>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-phone d-block h2 text-primary"></span>
              <a href="https://wa.me/6282117694669?text=Assalamu'alaikum" target="_blank">082117694669</a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-0">
              <span class="icon-mail_outline d-block h2 text-primary"></span>
              <a href="mailto:pramono6236@gmail.com">pramono6236@gmail.com</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">



            <form action="#" class="p-5 bg-white">

              <h2 class="h4 text-black mb-5">Kirim Pesan</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Nama lengkap</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Email</label>
                  <input type="email" id="email" class="form-control">
                </div>
              </div>
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Whatsapp</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Subject</label>
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Pesan</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Kirim" class="btn btn-primary btn-md text-white">
                </div>
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </div>

    <footer class="site-footer bg-light">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top">
              <p class="copyright">
                <small>
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Built <i class="icon-heart text-danger" aria-hidden="true"></i> by Pramono.
                </small></p>
              </div>
            </div>

          </div>
        </div>
      </footer>

    </div> <!-- .site-wrap -->

    <script src="{{asset('webApp/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('webApp/js/jquery-ui.js')}}"></script>
    <script src="{{asset('webApp/js/popper.min.js')}}"></script>
    <script src="{{asset('webApp/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('webApp/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('webApp/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('webApp/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('webApp/js/aos.js')}}"></script>
    <script src="{{asset('webApp/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('webApp/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('webApp/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('webApp/js/main.js')}}"></script>

  </body>
  </html>