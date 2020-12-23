@extends('site.layout.master')

@section('content')
    @if ( count(($cart['items'])) > 0 )
    <table class="table" style="margin-top: 50px">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Ops</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart['items'] as $item)
        <tr>
            <th scope="row">{{$item['object']->name}}</th>
            <td>{{$item['qty']}}</td>
            <td>{{$item['object']['price']}}</td>
            <td>
                <a class="btn btn-info" href="{{route('addToCart',$item['object']['id'])}}">+</a>
                <a class="btn btn-danger" href="{{route('decreaseQty',$item['object']['id'])}}">-</a>
            </td>
        </tr>
         @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-4 alert alert-success">
            <span>Total Price : <b>{{$cart['total_price']}} $</b></span>
        </div>

        <div class="col-sm-8">
            <a href="{{route('cartConfirmation')}}" class="btn btn-success">Next</a>
        </div>

    </div>
        @else
        <h1 class="text-center alert alert-warning"> Cart is empty please add <a href="/site">products</a> to cart</h1>
    @endif
    @endsection
