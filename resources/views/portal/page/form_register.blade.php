@extends('portal.layout.main')

@section('page_title')
    Koi Lover Makassar Project
@endsection

@section('meta_link_css_etc')
    <!-- Favicons -->
    <link href="{{asset('/dist/img/favicon.png')}}" rel="icon">
    <link href="{{asset('/dist/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
        <li><a href="#varietas">Variety</a></li>
        <li><a href="#awards">Awards</a></li>
        <li><a href="#faq">FAQ</a></li>
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
        <li><a href="#footer">Contact Us</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav><!-- .main-nav -->
@endsection

@section('s_faq')
    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
        <div class="container mt-5 pt-5">
          <header class="section-header pt-5 mt-5">
            <h3>Form Pendaftaran Peserta</h3>
            <p>Isi form dibawah ini untuk mendapatkan akun dan ikut berpartisipasi</p>
          </header>
  
        </div>
    </section><!-- #faq -->
@endsection

@section('footer')
    <!--==========================
    Footer
    ============================-->
    <footer id="footer" class="section-bg">
        <div class="footer-top">
        <div class="container">

            <div class="row justify-content-md-center">

            <div class="col-lg-6 ">

                <div class="form">

                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>

                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>

                    <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
                </form>
                </div>

            </div>

            

            </div>

        </div>
        </div>

        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
            -->
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