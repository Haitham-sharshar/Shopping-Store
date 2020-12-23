@extends('site.layout.master')

@section('content')
    <form action="{{route('cartStore')}}" class="container" method="post">
        @csrf
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>
    </div>
        <input type="submit" value="Save Cart" class="btn btn-info">
    </form>
    @endsection