<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Entities\Cart;
use Modules\Admin\Entities\Product;
use Modules\Api\Entities\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $cart = Cart::getCart();
        return response()->json($cart);
    }

    public function addToCart($product_id,$quantity,$session_id){
    	$euro = '0.92';
    	//check if session is active
    	$cart = Cart::where('session_id',$session_id)->get();

    	if($cart){
    		$product = Product::find($product_id);
    		$oldCart = Cart::find($cart->id);

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

    	}
    }
}
