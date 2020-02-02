@extends('portal.layout.main2')

@section('page_title')
    KLM Project | Best In Size
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <select class="form-control" id="cat_id" name="cat_id">
                @foreach ($data_cat as $cat)
                    <option value="{{$cat->id}}">{{$cat->min_size.' - '.$cat->max_size.' cm'}}</option>
                    
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
                        <h5 class="card-title m-1">#{{$n++}} {{Mush::no_reg($bis->id)}}</h5>
                        <p class="card-text mb-1">{{$bis->fish->name}} {{$bis->fish_size.' cm'}}</p>
                        <p class="card-text mb-1">{{$bis->user->bio->nama}}, ({{$bis->user->bio->kota}})</p>
                        <p class="card-text mb-1">{{$bio->handler_name}}, {{$bio->handler_address}}</p>
                    </div>
                </div>
            </div>            
        @endforeach
    </div>
    @endsection