@extends('site.layout.master')


@section('content')
    @if($errors)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif

    <ul class="alert-danger">
        @if(session()->has('msg'))
            <li>{{session()->get('msg')}}</li>
        @endif
    </ul>
    <form action="{{route('registerPost')}}" class="row container" method="post">
        @csrf
        <input type="hidden" name="redirect_url" value="{{request('redirect_url')}}">

        <div class="form-group col-sm-6">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group col-sm-6">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <input type="submit" value="Register" class=" btn btn-info ">
    </form>
    @endsection