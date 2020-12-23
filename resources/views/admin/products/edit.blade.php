@extends('admin.layout.master')

@section('title','Update Product')

@section('content')

    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products.form')
    </form>

    @endsection