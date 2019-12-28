@extends('backend.layout.main')

@section('pagecss')
    <style>
        .reqq {
            color: red;
        }
    </style>
@endsection

@section('pagetitle')
    User Fish Data
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    {{-- <li><a href="#"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li> --}}
    <li><a href="{{route('user.personal', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Data Diri</a></li>
    <li><a href="{{route('user.fish', ['id'=> auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Entry Ikan</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Pembayaran</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Pesan Panitia</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Ubah Password</a></li>

@endsection

@section('pagebreadcrumb')
    User Fish Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    Form registrasi ikan
                </div>
                <div class="card-body">
                    <form action="{{route('user.store_ikan')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Owner <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" name="owner_name" id="owner_name" value="{{$user->bio->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Nama Handler <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="text" class="form-control" name="handler_name" id="handler_name" placeholder="Handler Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Alamat Handler <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="text" class="form-control" name="handler_address" id="handler_address" placeholder="Provinsi dan Kota" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-4 col-form-label">Varietas Ikan <small class="reqq">*</small></label>
                            <div class="col-8">
                                <select class="form-control" name="varietas" id="varietas" required>
                                    <option value="">-- Pilih Varietas --</option>
                                    @foreach ($data_varietas as $var)
                                        <option value="{{$var->id}}">{{$var->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label">Ukuran Type <small class="reqq">*</small></label>
                            <div class="col-8">
                                <select class="form-control" name="type_ukuran" id="type_ukuran" required>
                                    <option value="">-- Pilih Ukuran --</option>
                                    @foreach ($data_cat as $cat)
                                        <option value="{{$cat->id}}" data-min_size="{{$cat->min_size}}" data-max_size="{{$cat->max_size}}" data-class="{{$cat->class}}" data-grade="{{$cat->grade}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Ukuran Ikan (cm) <small class="reqq">*</small></label>
                            <div class="col-8">
                                <input type="number" step="0.1" class="form-control" name="fish_size" id="fish_size" value="1.0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label">Grade Champion</label>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" name="grade" id="grade">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-4 col-form-label">Foto Ikan <small class="reqq">*</small> <br>(Min 100kb - Maks 500kb)</label>
                            <div class="col-8">
                                <input type="file" class="form-control-file" name="fish_pict" id="fish_pict">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-4 col-form-label"></label>
                            <div class="col-8">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" id="btn_submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script>
        $(document).ready(function(){
            $('#type_ukuran').change(function(){
                var data_grade = $('option:selected',this).data("grade");
                $('#grade').val(data_grade);

                $('#fish_size').attr({
                    'min': $('option:selected',this).data("min_size"),
                    'max' : $('option:selected',this).data("max_size"),
                    'value' : $('option:selected',this).data("min_size")
                    });
            });
            $('#fish_size').keyup(function(){
                var min_size = $(this).attr('min');
                var max_size = $(this).attr('max');
                var size = $(this).val();

                if(size < min_size || size > max_size) {
                    $(this).addClass('is-invalid');
                    $('#btn_submit').attr('disabled', true);
                } else {
                    $(this).removeClass('is-invalid');
                    $('#btn_submit').removeAttr('disabled', false);
                }
            });
        });
    </script>
@endsection

