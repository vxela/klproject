@extends('backend.layout.main')

@section('pagecss')
    
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
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-white font-weight-bold">
                    <div class="row">
                        <div class="col-6">
                            Data Ikan
                        </div>
                        <div class="col-6 text-right">
                            @if (count($data_fish) != 0)
                                <a href="{{route('user.regis_ikan', ['id' => $user_id])}}" class="btn btn-sm btn-success">Tambah Ikan</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($data_fish) != 0)
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        Jenis Ikan
                                    </th>
                                    <th>
                                        Ukuran
                                    </th>
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        Grade
                                    </th>
                                    <th>
                                        Biaya
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_fish as $fish)
                                    <tr>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                        <td>
                                            {{$fish->bio_id}}
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <div class="col-12 text-center">
                            <h3>Belum ada ikan terdaftar</h3>
                            <a href="{{route('user.regis_ikan', ['id' => $user_id])}}" class="btn btn-lg btn-success">Daftar Ikan</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection

