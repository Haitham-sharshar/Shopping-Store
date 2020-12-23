@extends('admin.layout.master')

@section('title','Create Product')

@section('content')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @include('admin.products.form')
    </form>

    @endsection