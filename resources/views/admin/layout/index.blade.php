@extends('admin.layout.master')

@section('title','Dashboard')


@section('content')
    <div class="card-group">
        <div class="card text-white bg-primary mb-3 text-center" style="max-width: 10rem;">
            <div class="card-header">Users</div>
            <div class="card-body">
                <h5 class="card-title">{{$users}}</h5>
            </div>
       </div>
        <div class="card text-white bg-success mb-3 text-center" style="max-width: 10rem;">
            <div class="card-header">Products</div>
            <div class="card-body">
                <h5 class="card-title">{{$products}}</h5>
            </div>
        </div>
    </div>
    @endsection