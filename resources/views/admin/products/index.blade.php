@extends('admin.layout.master')

@section('title','Products')

@section('content')
    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
    @endif

    <a href="{{route('products.create')}}" class="btn btn-success">Create New</a>
    <table class="table table-dark">
        <thead>
        <tr style="color:gold;">
            <th scope="col" >#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Ops</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr >
            <th scope="row" >{{$product->id}}</th>
            <td>{{$product->name}}</td>
            <td><img src="{{asset('storage/'.$product->image)}}" width="70px" height="70px"></td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                {!! Form::open(['route'=>['products.edit',$product->id],'method'=> 'GET']) !!}
                {!! Form::submit('EDIT',['class'=>'btn btn-success']) !!}
                {!! Form::close() !!}
                {!! Form::open(['route'=>['products.destroy',$product->id],'method'=> 'DELETE']) !!}
                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                 {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}}

    @endsection

  @section('script')
    {{--<script>--}}
        {{--$('.deleteBtn').click(function (e) {--}}
            {{--e.preventDefault();--}}

             {{--var url = $(this).attr('href');--}}
            {{--$.ajax({--}}
                {{--url: url,--}}
                {{--method: 'POST',--}}
               {{--data : {_method:  ' DELETE', _token:'{{csrf_token()}}}'},--}}
                {{--success : function () {--}}
                    {{--location.reload();--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
  @endsection
