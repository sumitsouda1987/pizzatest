<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Entities\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id','customer_address_title','customer_email','customer_address','customer_state','customer_city','customer_postcode','customer_phone','shipping_rate','total_quantity','grand_total'];

    /**
     * The cartitems that belong to the cart.
     */
    public function order_items()
    {
    	return $this->hasMany(OrderItem::class);
    }
}
