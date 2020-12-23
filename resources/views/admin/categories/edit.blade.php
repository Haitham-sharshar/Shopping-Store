@extends('admin.layout.master')

@section('title','Update Category')

@section('content')

    <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.categories.form')
    </form>

    @endsection