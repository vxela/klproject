@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Best In Size
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <select class="form-control cat_id" id="cat_id" name="cat_id">
                @foreach ($data_cat as $cat)
                    @if (isset($cat_id))
                        @if ($cat->id == $cat_id)
                            <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}" selected>{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @else
                            <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                        @endif
                    @else
                        <option value="{{$cat->id}}" data-url_r="{{route('bis_cat', ['cat_id' => $cat->id])}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                    @endif
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
        @foreach ($data_bis as $bis)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card">
                    <img class="card-img-top" src="{{$bis->fish_picture}}" alt="Card image cap" style="height: 300px; width: auto;">
                    <div class="card-body text-center p-1">
                        <h5 class="m-1">#{{$n++}} {{Mush::no_reg($bis->id)}}</h5>
                        <p class="card-text mb-1">{{ucfirst(strtolower($bis->fish->name))}} {{$bis->fish_size.' cm'}}</p>
                        <h5>Owner</h5>
                        <p class="card-text mb-1">{{ucfirst(strtolower($bis->bio->nama))}} <br> <small>({{ucfirst(strtolower($bis->bio->kota))}})</small></p>
                        <h5>Handler</h5>
                        <p class="card-text mb-1">{{ucfirst(strtolower($bis->handler_name))}} <br> <small>{{ucfirst(strtolower($bis->handler_address))}}</small></p>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>
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