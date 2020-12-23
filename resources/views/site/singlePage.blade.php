@extends('site.layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-3" style="border-right: 1px solid black;min-height:500px;  margin-top: 15px" >
             <img src="{{asset('storage/'.$product->image)}}" alt="" width="320" height="320" >
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Price : {{$product->price}} $</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
    </div>

    @endsection