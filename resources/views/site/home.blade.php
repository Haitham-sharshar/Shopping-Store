@extends('site.layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <ul style="padding-top:30px">
                @foreach($categories as $category)
                    <li>
                        <a href="{{request()->url().'?cat='.$category->slug}}">{{$category->name}}</a>
                    </li>
                @endforeach
                <li>
                    <a href="/site">All</a>
                </li>
            </ul>
        </div>
      <div class="col sm-9">
          <div class="row">
          @foreach($products as $product)

          <div class="card col-sm-4">
              <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Card image cap" width="50px" height="200px">
              <div class="card-body">
                  <h5 class="card-title">
                      <a href="{{route('singlePage',$product->id)}}">{{$product->name}}</a>
                  </h5>
                  <p class="card-text">{{\Illuminate\Support\Str::limit($product->description,45)}}</p>
                  <div>
                  <a href="{{route('addToCart',$product->id)}}" class="btn btn-primary">Add To Cart</a>
                      <p class="float-right">{{$product->price}}</p>
                  </div>
              </div>
          </div>
              @endforeach
          </div>
      </div>

    </div>
    @endsection
