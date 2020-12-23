<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsTo(Cart::class,'cart_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
