<?php

namespace App\Http\Controllers\site;

use App\Cart;
use App\CartOps;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
    {
       $product = Product::find($id);
        $cart = new CartOps();
        $cart->addToCart($product);
        return back();
    }
    public function showCart()
    {
        $cart = session('cart',[
                'total_price' => 0,
                'items' => collect()
       ]);
        return view ('site.cart',compact('cart'));
    }

    public function decreaseQty($id)
    {
        $product = Product::find($id);
        $cart = new CartOps();
        $cart->decrease($product);
        return back();
    }

    public function cartConfirmation ()
    {
        if (!auth()->check()){
            return redirect('login?redirect_url=site/Carts-Show');
        }
        return view ('site.cartConfirmation');
    }

    public function cartStore(Request $request)
    {
       $request->validate([
          'address' => 'required'
       ]);
        $cartobj = session('cart');
       $cart = auth()->user()->carts()->create($request->only('address'));

        //or
//        Cart::create([
//       'address' => $request->address,
//            'user_id' => auth()->id()
//        ]);
        foreach ($cartobj['items'] as $item ){
            $cart->items()->create([
          'product_id' => $item['object']['id'],
                'qty' => $item['qty'],
                'price' => $item['object']['price']
            ]);
            session()->forget('cart');
            return redirect('/site');
        }
    }
}
