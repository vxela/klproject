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
        <li class=""><a href="#intro">Home</a></li>
        <li><a href="#information">Information</a></li>
        <li><a href="#varietas">Variety</a></li>
        <li><a href="#awards">Awards</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#footer">Contact Us</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        </ul>
    </nav><!-- .main-nav -->
@endsection

@section('s_faq')
    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq" class="pb-2">
        <div class="container">
          <header class="section-header mt-3">
            <h3>Form Pendaftaran Peserta</h3>
            <p class="pb-1">Isi form dibawah ini untuk mendapatkan akun dan ikut berpartisipasi</p>
          </header>
  
        </div>
    </section><!-- #faq -->
@endsection

@section('footer')
    <!--==========================
    Footer
    ============================-->
    <footer id="footer" class="section-bg">
        <div class="footer-top pt-5">
        <div class="container">

            <div class="row justify-content-md-center">

            <div class="col-lg-6">
                
                <form action="">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Pemilik</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Pemilik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Asal Daerah Pemilik</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="" placeholder="Asal Daerah Pemilik">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Handling</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Handling">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Asal Daerah Handling</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="" placeholder="Asal Daerah Handling">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Nomor Telpon / WA</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="" placeholder="Nomor Telpon / WA">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Jenis/Variety Ikan</label>
                        <div class="col-sm-8 col-xs-12">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            {{-- <input type="text" class="form-control" id="owner_name" value="" placeholder="Nama Pemilik"> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Size Variety</label>
                        <div class="col-sm-8 col-xs-12">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8 col-xs-12">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Foto Ikan</label>
                        <div class="col-sm-8 col-xs-12 pt-1">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-xs-12 col-form-label">Biaya Pendaftaran</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" class="form-control" id="owner_name" value="200000" placeholder="Nama Pemilik" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-xs-12 text-right">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </div>                                                                                                                                                                                                                        
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