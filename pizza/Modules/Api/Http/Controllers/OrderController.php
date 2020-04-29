<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Entities\Order;
use Modules\Api\Entities\OrderItem;
use Modules\Api\Entities\CustomerAddress;
use Auth;


class OrderController extends Controller
{
    public function saveOrder(Request $request){
    	$postData = $request->all();

    	if(!empty($postData)){
    		$userId = Auth::guard('api')->user()->id;

	    	$orderArr = $postData['cart'];
	    	$shippingRate = $postData['shipping_charges'];
	    	$deliveryAddress = CustomerAddress::select('title','address','state','city','postcode','phone')->where(['id'=>$postData['address'], 'user_id'=>$userId])->first();
	    	
	    	$grand_total = $total_quantity = 0;
			foreach ($orderArr as $item) {
			    $grand_total += $item['total_price'];
			    $total_quantity += $item['quantity'];
			}

	    	$order = new Order([
	    		'user_id' => $userId,
	    		'customer_address_title' => $deliveryAddress->title,
	    		'customer_email' => Auth::guard('api')->user()->email,
	    		'customer_address' => $deliveryAddress->address,
	    		'customer_state' => $deliveryAddress->state,
	    		'customer_city' => $deliveryAddress->city,
	    		'customer_postcode' => $deliveryAddress->postcode,
	    		'customer_phone' => $deliveryAddress->phone,
	    		'shipping_rate' => $shippingRate,
	    		'total_quantity' => $total_quantity,
	    		'grand_total' => $grand_total,
	    		'status' => 'Processing'
	    	]);

	    	$order->save();

	    	foreach($orderArr as $item){
	    		$orderItem = new OrderItem([
	    			'order_id' => $order->id,
	    			'product_id' => $item['id'],
	    			'quantity' => $item['quantity'],
	    			'price' => $item['price'],
	    			'total_price' => round($item['total_price'], 2)
	    		]);

	    		$orderItem->save();
	    	}
	    }

    	return response()->json(['message' => 'success'], 200);
    }
}
