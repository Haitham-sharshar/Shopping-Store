@extends('admin.layout.master')

@section('title','Create Category')

@section('content')

    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
        @include('admin.categories.form')
    </form>

    @endsection