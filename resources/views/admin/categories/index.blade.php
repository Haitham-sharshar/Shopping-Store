@extends('admin.layout.master')

@section('title','Categories')

@section('content')
    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
    @endif

    <a href="{{route('categories.create')}}" class="btn btn-success">Create New</a>
    <table class="table table-dark">
        <thead>
        <tr style="color:gold;">
            <th scope="col" >#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Slug</th>
            <th scope="col">Ops</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr >
            <th scope="row" >{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td><img src="{{asset('storage/'.$category->image)}}" width="70px" height="70px"></td>
            <td>{{$category->slug}}</td>
            <td>
                {!! Form::open(['route'=>['categories.edit',$category->id],'method'=> 'GET']) !!}
                {!! Form::submit('EDIT',['class'=>'btn btn-success']) !!}
                {!! Form::close() !!}
                {!! Form::open(['route'=>['categories.destroy',$category->id],'method'=> 'DELETE']) !!}
                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                 {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $categories->links() !!}}

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
