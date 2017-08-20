<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Validator;

trait RequestValidation {

	 /**
	 * This validates the input's in the request.
	 *
	 * @param $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function loginFormValidation(Request $request) {

	    $validator = Validator::make($request->all(), [
	        'email'         => 'required|email|exists:users',
	        'password'      => 'required'
	    ]);

	    if ($validator->fails()) {
	        return $validator->errors()->all()[0];
	    }

	    return false;
	}

	 /**
	 * This validates the input's in the request.
	 *
	 * @param \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function userFormValidation(Request $request) {

	    $validator = Validator::make($request->all(), [
	    	'name' => 'required',
	        'email'         => 'required|email|unique:users',
	        'password'      => 'required|min:6',
	        'confirm_password' => 'required|min:6|same:password'
	    ]);

	    if ($validator->fails()) {
	        return $validator->errors()->all()[0];
	    }

	    return false;
	}
}