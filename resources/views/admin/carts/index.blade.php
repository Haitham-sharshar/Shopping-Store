@extends('admin.layout.master')

@section('title','Carts')

@section('content')
    <table class="table table-dark">
        <thead>
        <tr style="color:gold;">
            <th scope="col" >#</th>
            <th scope="col">Client</th>
            <th scope="col">Address</th>
            <th scope="col">Cart Status</th>
            <th scope="col">Total Price</th>
            <th scope="col">Ops</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
        <tr >
            <th scope="row" >{{$cart->id}}</th>
            <td>{{$cart->user->name}}</td>
            <td>{{$cart->address}}</td>
            <td>
                <select name="status" id="status" data-id="{{$cart->id}}">
                    @foreach($status as $s)
                    <option value="{{$s}}" {{$s == $cart->status ? 'selected' : ''}}>{{$s}}</option>
                        @endforeach
                </select>
            </td>
            <td>{{$cart->total_price}}</td>
            <td>
                {!! Form::open(['route'=>['carts.show',$cart->id],'method'=> 'GET']) !!}
                {!! Form::submit('Show',['class'=>'btn btn-info']) !!}
                 {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $carts->links() !!}

    @endsection

  @section('script')
   <script>
       $('#status').change(function (){

           var data = {};
          data.status = $(this).find('option:selected').val();
          data.cart_id = $(this).data('id');
           data._token = "{{csrf_token()}}";
           $.ajax({
              url : 'cart-update-status' ,
               method : 'post',
               data : data,
               success : function (data) {
               alert('Update Successfully');
               }
           });

       });
   </script>
  @endsection
