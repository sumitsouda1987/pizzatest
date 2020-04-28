<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;


class ApiCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	header("Access-Control-Allow-Origin: *");
    	header("Access-Control-Allow-Headers: Accept, Content-Type, X-Auth-Token, Origin, Authorization");
    	//Allow options methods
    	/*$headers= [
    		'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE, PATCH',
    		'Access-Control-Allow-Headers' => 'Accept, Content-Type, X-Auth-Token, Origin, Authorization'
    	];

    	if($request->getMethod() == 'OPTIONS'){
    		return response()->json('OK',200,$headers);
    	}*/

    	$secret = DB::table('oauth_clients')
    			->where('id', 4)
    			->pluck('secret')
    			->first();

		$request->merge([
			'grant_type' => 'password',
			'client_id' => 2,
			'client_secret' => $secret,
		]);

		$response = $next($request);

		/*foreact($headers as $key=>$value){
			$response->header($key, $value);
		}*/
		
        //return $next($request);

        return $response;
    }
}
