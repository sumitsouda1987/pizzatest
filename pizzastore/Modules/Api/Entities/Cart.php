<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Api\Entities\CartItem;
use Modules\Api\Entities\Cart;

class Cart extends Model
{
    protected $fillable = ['customer_first_name','customer_last_name','customer_email','customer_address','customer_state','customer_city','customer_phone','session_id','shipping_rate','grand_total_usd','grand_total_euro'];

    /**
     * The cartitems that belong to the cart.
     */
    public function cart_items()
    {
    	return $this->hasMany(CartItem::class);
    }

    public function getCart($session_id){
    	$cartArr = [];

    	//get all cart items by session id
    	$cart = Cart::with(['cart_items'])->where(['session_id'=>$session_id, 'status'=>1])->get();

    	if(!empty($cart)){
    		foreach($cart as $val){
    			foreach($val->cart_items as $item){
    				$cartArr['name'] => $item->product->name;
    				$cartArr['image'] => $item->product->filename;
    				$cartArr['price'] => $item->price;
    				$cartArr['quantity'] => $item->quantity;
    				$cartArr['shipping_rate'] => $val->shipping_rate;
    				$cartArr['grand_total_usd'] => $val->grand_total_usd;
    				$cartArr['grand_total_euro'] => $val->grand_total_euro;
    			}
    		}
    	}

    	return $cartArr;
    }
}
