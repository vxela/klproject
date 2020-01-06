@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Data Ikan
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_admin')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Admin</a></li>

@endsection

@section('pagebreadcrumb')
    Admin > Data Peserta
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Data Ikan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Pemilik</th>
                            <th>Nama Handler</th>
                            <th>Jenis Ikan</th>
                            <th>Ukuran Ikan</th>
                            <th>Grade</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_fish as $fish)
                            <tr>
                                <td>{{$fish->bio->nama}}</td>
                                <td>{{$fish->handler_name}}</td>
                                <td>{{$fish->fish->name}}</td>
                                <td>{{$fish->fish_size}}</td>
                                <td>{{$fish->cat->grade}}</td>
                                <td>{{$fish->date_reg.'['.$fish->time_reg.']'}}</td>
                                <td>{{$fish->status}}</td>
                                <td>
                                    <a href="{{route('admin.fish_sticker', ['id' => $fish->id])}}" class="btn btn-warning">Sticker</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="row">
                <div class="col-6">
                    <!-- total data -->
                    {{$data_fish->links()}}
                </div>
                <div class="col-6 text-right">
                    <!-- pagination -->
                    Menampilkan {{count($data_fish)}} Data
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection
