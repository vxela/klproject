@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Data Peserta
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-user-plus"></i> logout</a></li>
@endsection

@section('pagebreadcrumb')
    Admin > Data Peserta
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Data Peserta
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Nama
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Kontak
                        </th>
                        <th>
                            Prowinsi
                        </th>
                        <th>
                            Kab/Kota
                        </th>
                        <th>
                            Fish
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_peserta as $pes)
                        <tr>
                            <td>
                                {{$pes->user()->name}}
                            </td>
                            <td>
                                {{$pes->email}}
                            </td>
                            <td>
                                {{$pes->no_hp}}
                            </td>
                            <td>
                                {{$pes->prov}}
                            </td>
                            <td>
                                {{$pes->kota}}
                            </td>
                            <td>
                                <a href="{{route('admin.peserta_fish', ['id' => $pes->user_id])}}" class="btn btn-primary">Lihat Ikan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white">
            /
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection
