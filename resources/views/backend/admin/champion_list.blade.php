@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    Admin Dashboard | Champion List
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    <li><a href="{{route('admin.list_peserta')}}"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_admin')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Admin</a></li>

    {{-- <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li>
    <li><a href="{{route('admin.add_peserta')}}"><i class="fa fa-fw fa-user-plus"></i> Tambah Peserta</a></li> --}}
@endsection

@section('pagebreadcrumb')
    Admin Dashboard | Champion List
@endsection

@section('pagecontent')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header bg-white font-weight-bold">
                <div class="row">
                    <div class="col-6">Champion List</div>
                    <div class="col-6 text-right">
                        <a href="{{route('admin.add_champion')}}" class="btn btn-success">Tambah Champion</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        //
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                <div class="form-group row">
                    //
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <script>
    $(document).ready(function() {
        if($('#flash_data').length) {
            let type = $('#flash_data').data('type');
            let msg = $('#flash_data').data('msg');
        
            Swal.fire({
                icon: type,
                text: msg,
                showConfirmButton: true,
            });
        };

        $("#password2").keyup(function(){
            var v1 = $(this).val()
            var v2 = $('#password').val()
            if(v1!=v2) {
                $('#password').addClass('is-invalid');
                $('#password2').addClass('is-invalid');
            } else {
                $('#password').removeClass('is-invalid');
                $('#password2').removeClass('is-invalid');
            }
        });  

        $('.bio_id').on('change', function(){
            var bio_id = $('#bio_id').val();
            var turl = $(this).find(':selected').data('turl');
            if(bio_id != '') {
                $.ajax({
                    url : turl,
                    cache: false,
                    success: function(json) {
                        $("#fish_id").html('');
                        if(Object.keys(json).length > 0) {
                            for(i=0; i<Object.keys(json).length; i++) {
                                if(i==0) {
                                    $('#fish_id').append($('<option selected>').text(json[i].fish.name).attr('value', json[i].id));
                                } else {
                                    $('#fish_id').append($('<option>').text(json[i].fish.name).attr('value', json[i].id));
                                }
                            }
                        } else {
                            $('.fish_id').append($('<option>').text('Ikan Belum Lunas, Atau Ikan Belum Terdaftar').attr('value', ''));
                        }
                        console.log(json);
                    }
                });
            }
        });
    });
    </script>
@endsection