@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    User PersonalData
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    {{-- <li><a href="#"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li> --}}
    <li><a href="{{route('user.personal', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Data Diri</a></li>
    <li><a href="{{route('user.fish', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Entry Ikan</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Pembayaran</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Pesan Panitia</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Ubah Password</a></li>

@endsection

@section('pagebreadcrumb')
    User Personal Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Data Diri
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Username</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->name}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Lengkap</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->bio->nama}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">No. Telpon</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$user->bio->no_hp}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->bio->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Alamat</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->bio->alamat}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Provinsi</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->bio->prov}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Kab / Kota</label>
                            <div class="col-8">
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->bio->kota}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection

