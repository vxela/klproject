@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Champion
@endsection

@section('pagecss')
    <style>
    .font-card {
        font-size: 18px;
        font-weight: bolder;
        
    }
    .mimg {
        width: 100%;
    }
    </style>
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <select class="form-control cat_id" id="cat_id" name="cat_id">
                @foreach ($data_champion as $champ)
                    {{-- @if (isset($cat_id))
                        @if ($cat->id == $cat_id)
                            <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}" selected>{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @else
                            <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @endif
                    @else
                        <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @endif --}}
                        <option value="{{$champ->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $champ->grade])}}">{{$champ->grade}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        </div>
    </div>
    <div class="row">
        @php
            $n = 1;
        @endphp
        @foreach ($data_fchamp as $cmp)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mt-2 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{$cmp->user_fish->fish_picture}}" alt="Card image cap" style="height: 300px; width: auto;">
                    <div class="card-body text-center p-1">
                        <h5 class="font-card m-1">#{{$n++}} {{Mush::no_reg($cmp->user_fish->id)}}</h5>
                        <p class="card-text mb-1">{{ucwords(strtolower($cmp->user_fish->fish->name))}} {{$cmp->user_fish->fish_size.' cm'}}</p>
                        <h5 class="font-card">Owner</h5>
                        <p class="card-text mb-1">{{ucwords(strtolower($cmp->user_fish->bio->nama))}}</p><p class="mb-1"><small>({{ucwords(strtolower($cmp->user_fish->bio->kota))}})</small></p>
                        <h5 class="font-card">Handler</h5>
                        <p class="mb-1">{{ucwords(strtolower($cmp->user_fish->handler_name))}}</p><p class="mb-1"> <small>{{ucwords(strtolower($cmp->user_fish->handler_address))}}</small></p>
                        <button type="button" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modal{{Mush::no_reg($cmp->user_fish->id)}}">Full Image</button>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>

    {{-- @foreach ($data_bis as $mbis)

        <!-- Modal -->
        <div class="modal fade" id="modal{{Mush::no_reg($mbis->id)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{Mush::no_reg($mbis->id).' - '.$mbis->fish->name.' - '.$mbis->fish_size}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{$mbis->fish_picture}}" class="rounded mimg" alt="{{Mush::no_reg($mbis->id).' - '.$mbis->fish->name.' - '.$mbis->fish_size}}">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        
    @endforeach --}}
    @endsection

    @section('pagejs')
        <script>
        $(document).ready(function() {
            $('.cat_id').on('change', function() {
                var rurl = $('option:selected',this).data("url_r");

                $(location).attr('href', rurl);
            });
        });
        </script>
    @endsection