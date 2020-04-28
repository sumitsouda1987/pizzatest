<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\Categories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin::product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    	$categories = Categories::all()->toArray();
    	//echo "<pre>"; print_r($categories); exit;
        return view('admin::product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'status' =>'required',
            'price' =>'required',
            'category_id' =>'required',
            'filename' => 'required|mimes:jpeg,png,jpg,bmp|max:2048'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
            'price' => $request->get('price'),
            'category_id' => $request->get('category_id')
        ]);

        if($request->file('filename')) {
        	$product->filename = $this->uploadfile($request->file('filename'));
        }
        $product->save();

        return redirect(route('admin.product'))->with('success', 'Product saved!');
    }

    private function uploadfile($file){
		$name = time().time().'.'.$file->getClientOriginalExtension();	        
        $target_path = public_path('/uploads/');
        $file->move($target_path, $name);

        return $name;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin::product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
    	$rules = [
            'name'=>'required',
            'description'=>'required',
            'status' =>'required',
            'price' =>'required',
        ];

        if($request->file('filename')){
        	$rules['filename'] = 'mimes:jpeg,png,jpg,bmp|max:2048';
        }
        
        $request->validate($rules);

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->description =  $request->get('description');
        $product->status =  $request->get('status');
        $product->price =  $request->get('price');

        if($request->file('filename')) {
        	$product->filename = $this->uploadfile($request->file('filename'));
        }
        
        $product->save();

        return redirect(route('admin.product'))->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('admin.product'))->with('success', 'Product deleted!');
    }
}
