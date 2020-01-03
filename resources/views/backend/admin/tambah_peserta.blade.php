@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Dashboard | Admin Add Peserta
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
@endsection

@section('pagebreadcrumb')
    Admin Add Peserta
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <form action="">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Admin Tambah Peserta
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="_token" value="Zwn7CykLyuPcE7wavDFyeFeLEWpzDsS4EigZ4j9N">                        <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control nama_lengkap" id="nama_lengkap" name="nama_lengkap" value="" placeholder="Nama Lengkap" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">No. Telpon</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control no_hp" name="no_hp" id="no_hp" value="" placeholder="No. Telpon / WA" pattern=".[0-9]{11}" required="" title=" angka panjang 11 -13 karakter">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat Email</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="email" class="form-control email" name="email" id="email" value="" placeholder="Email" required="" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Alamat</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control alamat" name="alamat" id="alamat" value="" placeholder="Asal Daerah Pemilik" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Provinsi</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="provinsi" id="propinsi" required="">
                                        <option selected="" value=""> Pilih Provinsi </option>
                                    <option data-prov="ACEH" value="11">ACEH</option><option data-prov="SUMATERA UTARA" value="12">SUMATERA UTARA</option><option data-prov="SUMATERA BARAT" value="13">SUMATERA BARAT</option><option data-prov="RIAU" value="14">RIAU</option><option data-prov="JAMBI" value="15">JAMBI</option><option data-prov="SUMATERA SELATAN" value="16">SUMATERA SELATAN</option><option data-prov="BENGKULU" value="17">BENGKULU</option><option data-prov="LAMPUNG" value="18">LAMPUNG</option><option data-prov="KEPULAUAN BANGKA BELITUNG" value="19">KEPULAUAN BANGKA BELITUNG</option><option data-prov="KEPULAUAN RIAU" value="21">KEPULAUAN RIAU</option><option data-prov="DKI JAKARTA" value="31">DKI JAKARTA</option><option data-prov="JAWA BARAT" value="32">JAWA BARAT</option><option data-prov="JAWA TENGAH" value="33">JAWA TENGAH</option><option data-prov="DI YOGYAKARTA" value="34">DI YOGYAKARTA</option><option data-prov="JAWA TIMUR" value="35">JAWA TIMUR</option><option data-prov="BANTEN" value="36">BANTEN</option><option data-prov="BALI" value="51">BALI</option><option data-prov="NUSA TENGGARA BARAT" value="52">NUSA TENGGARA BARAT</option><option data-prov="NUSA TENGGARA TIMUR" value="53">NUSA TENGGARA TIMUR</option><option data-prov="KALIMANTAN BARAT" value="61">KALIMANTAN BARAT</option><option data-prov="KALIMANTAN TENGAH" value="62">KALIMANTAN TENGAH</option><option data-prov="KALIMANTAN SELATAN" value="63">KALIMANTAN SELATAN</option><option data-prov="KALIMANTAN TIMUR" value="64">KALIMANTAN TIMUR</option><option data-prov="KALIMANTAN UTARA" value="65">KALIMANTAN UTARA</option><option data-prov="SULAWESI UTARA" value="71">SULAWESI UTARA</option><option data-prov="SULAWESI TENGAH" value="72">SULAWESI TENGAH</option><option value="73" data-prov="SULAWESI SELATAN" selected="selected">SULAWESI SELATAN</option><option data-prov="SULAWESI TENGGARA" value="74">SULAWESI TENGGARA</option><option data-prov="GORONTALO" value="75">GORONTALO</option><option data-prov="SULAWESI BARAT" value="76">SULAWESI BARAT</option><option data-prov="MALUKU" value="81">MALUKU</option><option data-prov="MALUKU UTARA" value="82">MALUKU UTARA</option><option data-prov="PAPUA BARAT" value="91">PAPUA BARAT</option><option data-prov="PAPUA" value="94">PAPUA</option></select>
                                    <input type="hidden" name="prov" id="prov" value="SULAWESI SELATAN">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Asal Kota</label>
                                <div class="col-sm-8 col-xs-12">
                                    <select class="form-control m-b" name="kabupaten" id="kabupaten" required=""><option value="KABUPATEN KEPULAUAN SELAYAR">KABUPATEN KEPULAUAN SELAYAR</option><option value="KABUPATEN BULUKUMBA">KABUPATEN BULUKUMBA</option><option value="KABUPATEN BANTAENG">KABUPATEN BANTAENG</option><option value="KABUPATEN JENEPONTO">KABUPATEN JENEPONTO</option><option value="KABUPATEN TAKALAR">KABUPATEN TAKALAR</option><option value="KABUPATEN GOWA">KABUPATEN GOWA</option><option value="KABUPATEN SINJAI">KABUPATEN SINJAI</option><option value="KABUPATEN MAROS">KABUPATEN MAROS</option><option value="KABUPATEN PANGKAJENE DAN KEPULAUAN">KABUPATEN PANGKAJENE DAN KEPULAUAN</option><option value="KABUPATEN BARRU">KABUPATEN BARRU</option><option value="KABUPATEN BONE">KABUPATEN BONE</option><option value="KABUPATEN SOPPENG">KABUPATEN SOPPENG</option><option value="KABUPATEN WAJO">KABUPATEN WAJO</option><option value="KABUPATEN SIDENRENG RAPPANG">KABUPATEN SIDENRENG RAPPANG</option><option value="KABUPATEN PINRANG">KABUPATEN PINRANG</option><option value="KABUPATEN ENREKANG">KABUPATEN ENREKANG</option><option value="KABUPATEN LUWU">KABUPATEN LUWU</option><option value="KABUPATEN TANA TORAJA">KABUPATEN TANA TORAJA</option><option value="KABUPATEN LUWU UTARA">KABUPATEN LUWU UTARA</option><option value="KABUPATEN LUWU TIMUR">KABUPATEN LUWU TIMUR</option><option value="KABUPATEN TORAJA UTARA">KABUPATEN TORAJA UTARA</option><option value="KOTA MAKASSAR">KOTA MAKASSAR</option><option value="KOTA PAREPARE">KOTA PAREPARE</option><option value="KOTA PALOPO">KOTA PALOPO</option></select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Username</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="username" id="username" value="" placeholder="Username" required="" minlength="6" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required="" minlength="6" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-xs-12 col-form-label">Ulangi Password</label>
                                <div class="col-sm-8 col-xs-12">
                                    <input type="password" class="form-control" name="password2" id="password2" value="" placeholder="Ulangi Password" required="" minlength="6" autocomplete="off">
                                </div>
                            </div>                                                            
                            {{-- <div class="form-group row">
                                <div class="col-sm-4 col-xs-12 text-right">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <button type="submit" class="btn btn-primary" id="btn_submit">Daftar</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <div class="form-group row">
                        <div class="col-sm-4 col-xs-6 text-left">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        <div class="col-sm-8 col-xs-6 text-right">
                            <button type="submit" class="btn btn-primary" id="btn_submit">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('pagejs')
    
@endsection