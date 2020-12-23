<?php

namespace App\Http\Controllers\Dashboard;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('user','items')->orderByDesc('id')->paginate(20);
        $status = ['opened','accepted','canceled','on_delivery','delivered'];
        return view ('admin.carts.index',compact('carts','status'));
    }


    public function show($id)
    {
        $cart = Cart::with('user','items.product')->find($id);
        return view ('admin.carts.show',compact('cart'));
    }

  public function updateStatus(Request $request)
  {
      $cart = Cart::find($request->cart_id);
      $cart->update($request->only('status'));
      return response()->json(['status'=> true]);
  }
}
