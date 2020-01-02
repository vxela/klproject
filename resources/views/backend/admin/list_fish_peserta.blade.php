@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Data Ikan Peserta
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
    Admin > Data Ikan Peserta
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            Data Ikan
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Varietas
                        </th>
                        <th>
                            Size
                        </th>
                        <th>
                            Grade
                        </th>
                        <th>
                            Reg Fee
                        </th>
                        <th>
                            Status Pembayaran
                        </th>
                        <th>
                            Tanggal Reg
                        </th>
                        <th>
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_fish as $fs)
                    <tr>
                        <td>
                            {{$fs->fish->name}}
                        </td>
                        <td>
                            {{$fs->fish_size}}
                        </td>
                        <td>
                            {{$fs->cat->grade}}
                        </td>
                        <td>
                            {{'Rp. '.number_format($fs->cat->reg_price).',00'}}
                        </td>
                        <td>
                            @if ($fs->status == 'LUNAS')
                                <span class="badge badge-success">{{$fs->status}}</span>
                            @else
                                <span class="badge badge-warning">{{$fs->status}}</span>
                            @endif
                        </td>
                        <td>
                            {{$fs->date_reg}}
                        </td>
                        <td>
                            <a href="" class="btn btn-primary">Detail</a>
                            @if ($fs->status == 'BELUM LUNAS')
                                <a href="" class="btn btn-success">Konfirmasi</a>
                            @endif
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
