<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Entities\OrderItem;

class Order extends Model
{
    protected $fillable = ['cart_id','customer_first_name','customer_last_name','customer_email','customer_address','customer_state','customer_city','customer_phone','session_id','shipping_rate','grand_total_usd','grand_total_euro'];

    /**
     * The cartitems that belong to the cart.
     */
    public function order_items()
    {
    	return $this->hasMany(OrderItem::class);
    }
}
