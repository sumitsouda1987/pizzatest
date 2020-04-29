<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Entities\Order;
use Modules\Admin\Entities\Product;

class OrderItem extends Model
{
    protected $fillable = ['order_id','product_id','quantity','price','total_price'];

    /**
     * The orderitems that belong to the cart.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * The orderitems that has one product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
