<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Entities\Cart;
use Modules\Admin\Entities\Product;
use Modules\Api\Entities\CartItem;
use Modules\Api\Http\Controllers\ApiController;

class CartController extends ApiController
{
	public function __construct(){
		if(!$this->checkIfSessionActive()){
			return false;
		}
	}
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private function getCart($session_id)
    {
        $cart = Cart::getCart($session_id);
        return response()->json($cart);
    }

    public function addToCart($product_id,$quantity,$session_id){
    	$euro = '0.92';
    	//check if cart is already present for user
    	$cart = Cart::where(['session_id'=>$session_id, 'status'=>1])->get();

    	if($cart){
    		//get Product if already added
    		$product = Product::find($product_id);

    		//get cart item product if already added to update its quantity
    		$cartItemProduct = CartItem::where(['session_id'=>$session_id, 'product_id'=>$product_id])->get();
    	}
    	else{
    		$cartItemProduct = [];
    		$cart = Cart([
    			'session_id' => $session_id,
    			'shipping_rate' => 20,
    			'status' => 1,
    		]);

    		$cart->save();
    	}

    	if(empty($cartItemProduct)){
			$cartItem = CartItem([
    			'cart_id' => $cart->id,
    			'product_id' => $product_id,
    			'quantity' => $quantity,
    			'price' => $product->price,
    			'total_price_usd' => round($product->price * $quantity, 2),
    			'total_price_euro' => round(($product->price * $euro) * $quantity, 2),
    		]);

    		$cartItem->save();
		}
		else{
			$cartItemProduct->quantity = $quatity;
			$cartItemProduct->total_price_usd = round($product->price * $quantity, 2);
			$cartItemProduct->total_price_euro = round(($product->price * $euro) * $quantity, 2);

			$cartItemProduct->save();
		}

		//Update Cart
		$this->updateCart($cart->id);

		return $this->getCart($session_id);
    }

    public funciton updateCart($cart_id){
    	$euro = '0.92';
    	//get all cart items by cart id
    	$cartItems = CartItem::where('cart_id',$cart_id)->get();

    	if(!empty($cartItems)){
	    	$totalPrice = 0;
	    	foreach($cartItems as $item){
	    		$totalPrice = $totalPrice + ($item->price * $item->quantity);
	    	}

	    	$cart = Cart::find($cart_id);

	    	//add shipping cost in total price
	    	$totalPrice = $totalPrice + $cart->shipping_rate;

	    	$cart->grand_total_usd = round($totalPrice, 2);
	    	$cart->grand_total_euro = round(($totalPrice * $euro), 2);

	    	$cart->save();
	    }
    }

    public function confirmOrder(Request $request){
    	$postData = $request->all();

    	$cart = Cart::where(['session_id'=>$postData['session_id'], 'status' => 1])->get();

    	$cart->customer_first_name = $postData['first_name'];
    	$cart->customer_last_name = $postData['last_name'];
    	$cart->customer_email = $postData['email'];
    	$cart->customer_address = $postData['address'];
    	$cart->customer_state = $postData['state'];
    	$cart->customer_city = $postData['city'];
    	$cart->customer_phone = $postData['phone'];

    	$cart->save();

    	return $this->getCart($postData['session_id']);
    }
}
