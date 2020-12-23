<?php

namespace App;

class CartOps {
    public $cart;
    public function __construct()
    {
        $this->cart = session('cart',[
           'total_price' => 0,
            'items' => collect()
        ]);
    }

    public function addToCart($product)
    {
        $items = $this->cart['items'];
        $total_price = $this->cart['total_price'];
        if ($items->contains('object.id', $product->id)) {
            $items = $items->map(function ($item) use ($product) {
                if ($item['object']->id == $product->id) {
                    $item['qty'] += 1;
                }
                return $item;
            });
        } else {
            $newItem = collect([
                'qty' => 1,
                'object' => $product
            ]);
            $items = $items->push($newItem);
        }
        $total_price += $product->price;
        $cart = ['cart' => [
            'total_price' => $total_price,
            'items' => $items
        ]];
        session()->put($cart);
    }

    public function decrease($product)
    {
        $items = collect( $this->cart['items']);
        $total_price = $this->cart['total_price'];
     $items =   $items->transform(function($item)use($product){
        if($item['object']->id ==$product->id){
         $item['qty'] -= 1;
        }
            return $item;
    })->filter(function ($item){
        return $item['qty'] >0 ;
     });
        $total_price -= $product->price;
        $cart = ['cart' => [
            'total_price' => $total_price,
            'items' => $items
        ]];
        session()->put($cart);
    }
}
