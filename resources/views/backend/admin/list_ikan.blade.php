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
    <li><a href="{{route('admin.fish_entry')}}"><i class="fa fa-fw fa-table"></i> Data Ikan</a></li>
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
                <table class="table" id="data_fish">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>REG NUMBER</th>
                            <th>Nama Pemilik</th>
                            <th>Nama Handler</th>
                            <th>Jenis Ikan</th>
                            <th>Ukuran Ikan</th>
                            <th>Grade</th>
                            <th>Status</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n=1;
                        @endphp
                        @foreach ($data_fish as $fish)
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{Mush::no_reg($fish->id)}}</td>
                                <td>{{$fish->bio->nama}}</td>
                                <td>{{$fish->handler_name}}</td>
                                <td>{{$fish->fish->name}}</td>
                                <td>{{$fish->fish_size}}</td>
                                <td>{{$fish->cat->grade}}</td>
                                <td>
                                @if ($fish->status == 'BELUM LUNAS')
                                    <span class="badge badge-warning">{{$fish->status}}</span>
                                @else
                                    <span class="badge badge-success">{{$fish->status}}</span>
                                @endif
                                </td>
                                <td>
                                    {{-- <a href="{{route('admin.fish_sticker', ['id' => $fish->id])}}" class="btn btn-sm btn-primary">Sticker</a> --}}
                                    <a href="{{route('admin.detail_user_fish', ['id' => $fish->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a>
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
    <script>
    $(document).ready(function(){
        $('#data_fish').DataTable();
    });
    </script>
@endsection
