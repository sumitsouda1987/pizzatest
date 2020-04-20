<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Entities\Cart;
use Modules\Admin\Entities\Product;

class CartItem extends Model
{
    protected $fillable = ['cart_id','product_id','quantity','price','total_price_usd','total_price_euro'];

    /**
     * The cartitems that belong to the cart.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }

    /**
     * The cartitem that has one product.
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
