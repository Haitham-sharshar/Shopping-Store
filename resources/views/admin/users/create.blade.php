@extends('admin.layout.master')

@section('title','Create User')

@section('content')

    <form action="{{route('users.store')}}" method="post">
        @include('admin.users.form')
    </form>

    @endsection