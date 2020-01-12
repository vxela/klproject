@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Dashboard | Fish Point List
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
Dashboard | Fish Point List
@endsection

@section('pagecontent')
    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold">
            <div class="row">
                <div class="col-6">
                    Data Fish Point Peserta
                </div>
                <div class="col-6 text-right">
                    @if (count($data_point) > 0)
                        <a href="#" class="btn btn-primary">Form Point</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (count($data_point) == 0)
                <div class="col-12 text-center">
                    <h3>
                        Belum ada data
                    </h3>
                    <a href="{{route('admin.add_fish_point')}}" class="btn btn-lg btn-primary">Tambah Data Point</a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Nama Owner
                                </th>
                                <th>
                                    Nama Handler
                                </th>
                                <th>
                                    Variety
                                </th>
                                <th>
                                    Point
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer bg-white">
            <div class="row">
                <div class="col-6">
                    {{-- Show {{count($data_peserta)}} Participant --}}
                </div>
                <div class="col-6 text-right">
                    {{-- {{$data_peserta->links()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    
@endsection
