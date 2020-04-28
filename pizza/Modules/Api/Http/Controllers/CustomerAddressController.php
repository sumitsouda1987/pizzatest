<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Api\Entities\CustomerAddress;
use Auth;

class CustomerAddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    	//echo "<pre>"; print_r($request->all()); exit;
        $request->validate([
            'title'=>'required',
            'address'=>'required',
            'state'=>'required',
            'city' =>'required',
            'postcode' =>'required',
            'phone' =>'required'
        ]);
       // echo "<pre>".$request->get('address'); print_r(); exit;
        $address = new CustomerAddress([
            'title' => $request->get('title'),
            'address' => $request->get('address'),
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'postcode' => $request->get('postcode'),
            'phone' => $request->get('phone'),
            'user_id' => Auth::guard('api')->user()->id
        ]);

        $address->save();

        return response()->json(['message' => 'success'], 200);
    }

    public function getUserAddresses(){
    	$addresses = CustomerAddress::select('id','title','address','state','city','postcode','phone')->where('user_id', Auth::guard('api')->user()->id)->get();
        return response()->json($addresses, 200);
    }

}
