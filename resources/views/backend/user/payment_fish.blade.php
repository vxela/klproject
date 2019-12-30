@extends('backend.layout.main')

@section('pagecss')
    
@endsection

@section('pagetitle')
    User Payment Data
@endsection

@section('topnav')
    
@endsection

@section('usertopnav')
    
@endsection

@section('pagemenu')
    {{-- <li><a href="#"><i class="fa fa-fw fa-users"></i> Data Pendaftar</a></li> --}}
    <li><a href="{{route('user.personal', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Data Diri</a></li>
    <li><a href="{{route('user.fish', ['id' => auth()->user()->id])}}"><i class="fa fa-fw fa-play"></i> Entry Ikan</a></li>
    <li><a href="{{route('user.payment_fish')}}"><i class="fa fa-fw fa-play"></i> Pembayaran</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Pesan Panitia</a></li>
    <li><a href="#"><i class="fa fa-fw fa-play"></i> Ubah Password</a></li>

@endsection

@section('pagebreadcrumb')
    User Payment Data
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-12">
            @if (count($fish_bl) > 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Belum Lunas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($fish_bl as $fbl)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mb-3">
                                    <div class="card" style="">
                                        <img class="card-img-top" src="{{$fbl->fish_picture_thumb}}" alt="Card image cap">
                                        <div class="card-body text-center px-2">
                                            <h5 class="card-title mb-1">{{$fbl->fish->name}}</h5>
                                            <p class="card-text mb-1"><span class="badge badge-warning">{{$fbl->status}}</span></p>
                                            <a href="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-info">Detail</a>
                                            {{-- <a href="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-info">Detail</a> --}}
                                            @php
                                                $date = Carbon\Carbon::parse($fbl->created_at);
                                            @endphp
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-primary" 
                                                data-toggle="modal" 
                                                data-target="#data_ikan"
                                                data-no_bill="{{'#'.$date->format('Ymd').'/'.$fbl->id.'/'.$fbl->user_id.'/'.$fbl->fish_id.'/'.$fbl->cat_id}}"
                                                data-own_name="{{$fbl->bio->nama}}"
                                                data-fish_type="{{$fbl->fish->name}}"
                                                data-fish_grade="{{$fbl->cat->grade}}"
                                                data-reg_price="{{number_format($fbl->cat->reg_price)}}" 
                                                data-reg_status="{{$fbl->status}}"
                                                data-panitia_rek="{{'43243223234324 Bri'}}"
                                                data-panitia_rek_name="{{'An. Ridho Y'}}"
                                                data-panitia_alamat="{{'Jln. Adhyaksa No. 1 Makassar'}}"
                                                data-panitia_email="{{'ndayuw@gmail.com'}}"
                                                data-panitia_cp1="0822 1122 3355 (Ridho Y)"
                                                data-panitia_cp2="0822 1122 3355 (Abe)"
                                                >Mbill</button>
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fbl->id])}}" class="btn btn-sm btn-primary btn_print" id="btn_print">Bill</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if (count($fish_l) > 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Lunas
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($fish_l as $fl)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 mb-3">
                                    <div class="card" style="">
                                        <img class="card-img-top" src="{{$fl->fish_picture_thumb}}" alt="Card image cap">
                                        <div class="card-body text-center px-2">
                                            <h5 class="card-title mb-1">{{$fl->fish->name}}</h5>
                                            <p class="card-text mb-1"><span class="badge badge-warning">{{$fl->status}}</span></p>
                                            <a href="{{route('user.detail_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-info">Detail</a>
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-primary" id="">Mbill</button>
                                            <button type="button" target="_blank" data-route_url="{{route('user.detail_fish', ['id' => $fl->id])}}" class="btn btn-sm btn-primary btn_print" id="btn_print">Bill</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- modal here --}}
                <div class="modal fade" id="data_ikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            Koi Lovers Makasar Project
                                        </div>
                                        <div class="col-12 text-center">
                                            <small id="kl_address">Alamat</small>
                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>No Bill :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" >
                                            <small id="bill_nbr"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Owner :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0">
                                            <small id="own_name"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Fish Variety :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="f_vty"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Fish Grade :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="f_grade"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Reg Price :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="reg_price"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Pay Status :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="pay_sts"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>Pay To :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="rek_number"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 my-0">
                                            <small></small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="rek_name"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>CP1 :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="panitia_cp1"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 py-0 pr-0 my-0 text-right">
                                            <small>CP2 :</small>
                                        </div>
                                        <div class="col-8 py-0 my-0" id="no_bill">
                                            <small id="panitia_cp2"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($fish_l) == 0 && count($fish_bl) == 0)
                <div class="card mb-4">
                    <div class="card-header bg-white font-weight-bold">
                        Data Pembayaran Belum Ada
                    </div>
                    <div class="card-body text-center">
                        <h3>Belum ada ikan terdaftar</h3>
                        <a href="{{route('user.regis_ikan', ['id' => auth()->user()->id])}}" class="btn btn-lg btn-success" id="btn_print">Daftar Ikan</a>                        
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('pagejs')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
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

        $('.btn_print').on('click', function(){
            var doc = new jsPDF({
                orientation : 'p',
                unit        : 'mm',
                format      : [200, 300]
            });
            doc.setFont("helvetica");
            doc.setFontType("bold");
            doc.setFontSize(9);
            doc.text('Hello world!<br>sdasdsa', 10, 10);
            doc.save('bill.pdf');
        });

        $('#data_ikan').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var kl_address = button.data('panitia_alamat');
            var bill_nbr = button.data('no_bill');
            var own_name = button.data('own_name');
            var f_vty = button.data('fish_type');
            var f_grade = button.data('fish_grade');
            var reg_price = button.data('reg_price');
            var pay_sts = button.data('reg_status');
            var rek_number = button.data('panitia_rek');
            var rek_name = button.data('panitia_rek_name');
            var panitia_cp1 = button.data('panitia_cp1');
            var panitia_cp2 = button.data('panitia_cp1');
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body #kl_address').text(kl_address);
            modal.find('.modal-body #bill_nbr').text(bill_nbr);
            modal.find('.modal-body #own_name').text(own_name);
            modal.find('.modal-body #f_vty').text(f_vty);
            modal.find('.modal-body #f_grade').text(f_grade);
            modal.find('.modal-body #reg_price').text(reg_price);
            modal.find('.modal-body #pay_sts').text(pay_sts);
            modal.find('.modal-body #rek_number').text(rek_number);
            modal.find('.modal-body #rek_name').text(rek_name);
            modal.find('.modal-body #panitia_cp1').text(panitia_cp1);
            modal.find('.modal-body #panitia_cp2').text(panitia_cp2);
            
        })

    })
    </script>
@endsection

