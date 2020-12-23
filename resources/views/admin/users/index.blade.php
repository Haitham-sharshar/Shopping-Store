@extends('admin.layout.master')

@section('title','Users')

@section('content')
    @if(session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
    @endif

    <a href="{{route('users.create')}}" class="btn btn-success">Create New</a>
    <table class="table table-dark">
        <thead>
        <tr style="color:gold;">
            <th scope="col" >#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Ops</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr >
            <th scope="row" >{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            <td>
                {!! Form::open(['route'=>['users.edit',$user->id],'method'=> 'GET']) !!}
                {!! Form::submit('EDIT',['class'=>'btn btn-success']) !!}
                {!! Form::open(['route'=>['users.destroy',$user->id],'method'=> 'DELETE']) !!}
                {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                 {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}}

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
