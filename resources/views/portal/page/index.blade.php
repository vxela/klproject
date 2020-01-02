@extends('portal.layout.main')

@section('page_title')
    Koi Lover Makassar Project
@endsection

@section('meta_link_css_etc')
    <!-- Favicons -->
    {{-- <link href="{{asset('/dist/img/favicon.png')}}" rel="icon">
    <link href="{{asset('/dist/img/apple-touch-icon.png')}}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('/dist/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('/dist/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/dist/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset('/dist/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
@endsection

@section('topbar_header')
    <div id="topbar">
        <div class="container">
        <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
        </div>
    </div>
@endsection

@section('logo')
    <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h2 class="text-light"><a href="#intro" class="scrollto"><span>KLM PROJECT</span></a></h2>
        {{-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> --}}
    </div>
@endsection

@section('navigation')
    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
        <li class="active"><a href="#intro">Home</a></li>
        <li><a href="#information">Information</a></li>
        {{-- <li><a href="#varietas">Variety</a></li>
        <li><a href="#awards">Awards</a></li>
        <li><a href="#faq">FAQ</a></li> --}}
        {{-- <li><a href="#team">Team</a></li>
        <li class="drop-down"><a href="">Drop Down</a>
            <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
            </li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>
            </ul>
        </li> --}}
        {{-- <li><a href="#footer">Contact Us</a></li> --}}
        <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav><!-- .main-nav -->
@endsection

@section('s_intro')
    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
            <h2>Makassar<br>Junior Koi Contest<br><span>2020</span></h2>
            <div>
                <a href="{{route('register')}}" class="btn-get-started scrollto">Daftar disini</a>
            </div>
            </div>
    
            <div class="col-md-6 intro-img order-md-last order-first">
            <img src="{{asset('/dist/img/intro-kl.svg')}}" alt="" class="img-fluid">
            </div>
        </div>

        </div>
    </section><!-- #intro -->    
@endsection

@section('s_info')
    <!--==========================
      Information Section
    ============================-->
    <section id="information">

        <div class="container">
          <div class="row">
  
            <div class="col-lg-5 col-md-6">
              <div class="about-img">
                <img src="{{asset('/dist/img/banner_contest.jpg')}}" alt="">
              </div>
            </div>
  
            <div class="col-lg-7 col-md-6">
                <div class="about-content">
                    <h2>Information</h2>
                    <h3>Informasi dan Tata Cara Pendaftaran Event Makassar Junior Koi Kontest yang diselenggarakan oleh Koi Lovers Makassar Project</h3>
                
                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> Isi data diri secara lengkap yang tersedia pada menu form register atau klik Daftar disini </li>
                        <li><i class="ion-android-checkmark-circle"></i> Login dengan menggunakan username dan password yang telah diisi sebelumnya pada menu register</li>
                        <li><i class="ion-android-checkmark-circle"></i> Input jenis atau kategori yang diikuti pada sub menu fish entry</li>
                        <li><i class="ion-android-checkmark-circle"></i> Lakukan pembayaran dengan cara transfer ke rekening panitia dan lakukan konfirmasi pembayaran melalui WA ke nomor panitia</li>
                        <li><i class="ion-android-checkmark-circle"></i> Untuk informasi selengkapnya silahkan hubungi kami di +62-852-9722-2999.</li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
  
    </section><!-- #about -->    
@endsection

@section('s_varietas')
    <!--==========================
      Varietas Section
    ============================-->
    {{-- <section id="varietas" class="section-bg py-5">
        <div class="container">
          <div class="section-header">
            <h3>Variety</h3>
            <p>Varietas yang diperlombakan : </p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6 wow fadeInUp">
              <div class="member">
                <img src="{{asset('/dist/img/varietas/kohaku.png')}}" class="img-fluid" alt="">
                <div class="member-info text-center">
                  <div class="member-info-content">
                    <h4>KOHAKU KOI</h4>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/taiso_sanshoku.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>TAISHO SANSHOKU</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/showa_sansohaku.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>SHOWA SANSHOKU</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/shiro_utsuri.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>SHIRO UTSURI</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/koromo.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>KOROMO</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/goshiki.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>GOSHIKI</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/hikari_moyomono.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>HIKARI MUJIMONO</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/ginrin_a.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>GIRIN A</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/doitsu.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>DOITSU</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/kawarimono.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>KAWARIMONO</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/hi_ki_utsuri.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>HI KI UTSURI</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/bekko.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>BEKKO</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/asagi.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>ASAGI</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/hikari_mujimono.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>HIKARI MUJIMONO</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/girin_b.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>GIRIN B</h4>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 wow fadeInUp">
                <div class="member">
                    <img src="{{asset('/dist/img/varietas/tancho.png')}}" class="img-fluid" alt="">
                    <div class="member-info text-center">
                    <div class="member-info-content">
                        <h4>TANCHO</h4>
                    </div>
                    </div>
                </div>
            </div>
  
          </div>
  
        </div>
    </section>      --}}
@endsection

@section('footer')
    <!--==========================
    Footer
    ============================-->
    <footer id="footer" class="section-bg">
        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- #footer -->
@endsection

@section('src_js')
    <script src="{{asset('/dist/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/dist/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('/dist/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/dist/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/dist/lib/mobile-nav/mobile-nav.js')}}"></script>
    <script src="{{asset('/dist/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('/dist/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/dist/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('/dist/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/dist/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/dist/lib/lightbox/js/lightbox.min.js')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{asset('/dist/contactform/contactform.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('/dist/js/main.js')}}"></script>
@endsection