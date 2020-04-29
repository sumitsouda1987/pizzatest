<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Product;
use Modules\Api\Entities\Order;
use Modules\Api\Entities\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $orders = Order::with(['order_items','order_items.product'])->get();
        return view('admin::dashboard.index', compact('orders'));
    }
}
