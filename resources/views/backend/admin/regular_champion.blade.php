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
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <select class="form-control" id="cat_id">
                                    <option>  Plih Ukuran  </option>
                                    @foreach ($data_cat as $cat)
                                        <option value="{{$cat->id}}">{{$cat->min_size.'-'.$cat->max_size.' cm'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <select class="form-control" id="varietas_id">
                                    <option>  Plih Ukuran  </option>
                                    @foreach ($data_var as $var)
                                        <option value="{{$var->id}}">{{$var->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data_fish as $fish)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card">
                                        <img class="card-img-top" src="{{$fish->fish_picture_thumb}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>                                
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        I am a card footer.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection
