@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Regular Champion
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.fish_entry')}}"><i class="fa fa-fw fa-table"></i> Data Ikan</a></li>
    <li><a href="{{route('admin.add_peserta')}}`"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_admin')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Admin</a></li>
@endsection

@section('pagebreadcrumb')
    Dashboard > <small>Fish Regular Champion</small>
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form action="{{route('admin.store_regular_champion')}}" method="post">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-header bg-white font-weight-bold">
                                Form Tambah Regular Champion
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="varietas" class="col-sm-4 col-xs-12 col-form-label">Kategory</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="cat_reg_id" name="cat_reg_id" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($data_cat as $cat)
                                                <option value="{{$cat->id}}">{{$cat->fish()->name.' | Posisi '.$cat->position}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="peserta" class="col-sm-4 col-xs-12 col-form-label">Peserta</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="peserta_id" name="peserta_id" required>
                                            <option value="">Pilih Peserta</option>
                                            @foreach ($data_fish as $fish)
                                                <option value="{{$fish->id}}">{{Mush::no_reg($fish->id)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>                        
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form action="{{route('admin.store_cat_regular_champion')}}" method="post">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-header bg-white font-weight-bold">
                                Form Tambah Category Regular Champion
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="varietas" class="col-sm-4 col-xs-12 col-form-label">Varietas</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="var_id" name="var_id" required>
                                            <option value="">Pilih Jenis Varietas</option>
                                            @foreach ($data_var as $var)
                                                <option value="{{$var->id}}"> {{$var->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="posisi" class="col-sm-4 col-xs-12 col-form-label">Posisi</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <select class="form-control" id="posisi" name="posisi" required>
                                            <option value="">Pilih Posisi</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-4 col-xs-12 col-form-label">Deskripsi</label>
                                    <div class="col-sm-8 col-xs-12">
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($data_regch as $rc)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{$rc->peserta()->fish_picture_thumb}}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0">{{'# '.$rc->cat_reg()->position.' - '.Mush::no_reg($rc->fish_id)}}</h5>
                        <strong>[{{$rc->cat_reg()->fish()->name}}] [{{$rc->peserta()->fish_size.' cm'}}]</strong><br>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    $(document).ready(function(){

        if($('#flash_data').length) {
            let type = $('#flash_data').data('type');
            let msg = $('#flash_data').data('msg');
        
            Swal.fire({
                icon: type,
                text: msg,
                showConfirmButton: true,
            });
        };
    });
    </script>
@endsection
