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
    <div class="card bg-light mb-3">
        <div class="card-header">
            Best In Size
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection