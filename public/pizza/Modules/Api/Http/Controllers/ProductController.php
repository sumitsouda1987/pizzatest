<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;

class ProductController extends Controller
{
    /**
     * Get all Products.
     * @return Response
     */
    public function all()
    {
    	$allProducts = array();
        $products = Product::with(['categories'])->where('status', 1)->get();
        
        foreach($products as $k=>$product){
        	$allProducts[$product->categories->id]['category']['catid'] = $product->categories->id;
        	$allProducts[$product->categories->id]['category']['catname'] = $product->categories->name;
        	$allProducts[$product->categories->id]['category']['product'][$k]['id'] = $product->id;
        	$allProducts[$product->categories->id]['category']['product'][$k]['name'] = $product->name;
        	$allProducts[$product->categories->id]['category']['product'][$k]['description'] = $product->description;
        	$allProducts[$product->categories->id]['category']['product'][$k]['price'] = $product->price;
        	$allProducts[$product->categories->id]['category']['product'][$k]['total_price'] = $product->price;
        	$allProducts[$product->categories->id]['category']['product'][$k]['image'] = asset('uploads/' . $product->filename);
        }  

        return response()->json($allProducts);
    }
}