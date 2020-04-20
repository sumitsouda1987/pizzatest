<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function all()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    public function getProductsByCategoryName($name = '')
    {	$products = Product::with(['categories'=>function($q) use($name){
    		$q->where('name',$name);
    	}])->where('status', 1)->get();
    	
        //$categories = Product::where(['name'=> $name])->get();
        return response()->json($products);
    }
}
