<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Api\Entities\Cart;
use Modules\Api\Entities\Order;
use Modules\Api\Entities\OrderItem;

class OrderController extends Controller
{
	public function __construct(){
		if(!$this->checkIfSessionActive()){
			return false;
		}
	}

    public function saveOrder(Request $request){
    	$postData = $request->all();
    	//get Cart by session id 
    	$cart = Cart::with('cart_items')->where(['session_id'=>$postData['session_id'], 'status'=>1])->get();

    	$order = Order([
    		'cart_id' => $cart->id,
    		'session_id' => $postData['session_id'],
    		'customer_first_name' => $cart->first_name,
    		'customer_last_name' => $cart->last_name,
    		'customer_email' => $cart->email,
    		'customer_address' => $cart->address,
    		'customer_state' => $cart->state,
    		'customer_city' => $cart->city,
    		'customer_phone' => $cart->phone,
    		'shipping_rate' => $cart->shipping_rate,
    		'grand_total_usd' => $cart->grand_total_usd,
    		'grand_total_euro' => $cart->grand_total_euro,
    		'status' => 'Processing'
    	]);

    	$order->save();

    	foreach($cart->cart_items as $items){
    		$orderItem = OrderItem([
    			'order_id' => $order->id,
    			'product_id' => $items->product_id,
    			'quantity' => $items->quantity,
    			'price' => $items->price,
    			'total_price_usd' => round($items->total_price_usd, 2),
    			'total_price_euro' => round($items->total_price_euro, 2),
    		]);

    		$orderItem->save();
    	}

    	//Remove or Update cart
    	$cart->status = 0;
    	$cart->save();

    	$response = ['message' => 'Order successfully placed']

    	return response()->json($response);
    }
}
