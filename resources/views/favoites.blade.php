@extends('layouts.header')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row">
                @foreach($doctors as $result)
                    <div class="col-4">
                        <div class="listBox">
                            <div class="profileBox">
                                <img src="{{$result->doctor->profile_picture}}">
                            </div>
                            <div class="infoBox row col-12 m-0 pt-3">
                                <div class="col-3">
                                    <span class="fav active" data-id="{{$result->doctor->id}}">
                                        <i class="fa fa-heart"></i>
                                    </span>
                                </div>
                                <div class="details col-9">
                                    <h4>{{$result->doctor->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .container-fluid {
        background-color: #fcfcfc;
    }
    span.active {
        color: #b50404;
    }
</style>
@endsection