<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\RequestValidation;
use Illuminate\Support\Facades\Log;
use App\Repositories\UserRepository;


class UserController extends Controller
{
    use RequestValidation;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(UserRepository $loginProxy)
    {
        $this->loginProxy = $loginProxy;
    }

    /**
     * login crediential check.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        Log::info('login inputs - '. json_encode($request->all()));

        //Validates data
        if ($validation = $this->loginFormValidation($request)) {
           return response()->json([
                'status' => 0,
                'message' => $validation
            ]);
        }

        return $this->loginProxy->attemptLogin($request);
    }

    /**
     * logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Log::info('logout inputs - '. json_encode($request->all()));

        return $this->loginProxy->attemptLogout($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userRegister(Request $request)
    {
        Log::info('userRegister inputs - '. json_encode($request->all()));

        //Validates data
        if ($validation = $this->userFormValidation($request)) {
           return response()->json([
                'status' => 0,
                'message' => $validation
            ]);
        }

        return $this->loginProxy->userRegister($request);
    }

    /**
     * Retrieve user detail.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userDetails(Request $request)
    {
        $userID = $request->user()->id;
        //return $userID;
        //Log::info('userDetails output - '. json_encode($request->all()));

        return $this->loginProxy->userDetails($userID);
    }

}