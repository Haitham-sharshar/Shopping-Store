<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    public function items()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getTotalPriceAttribute()
    {
        $items = $this->items;
        $total = 0;
        foreach ($items as $item){
            $total += $item->price * $item->qty ;
        }
        return $total;
    }
}
