<?php

namespace App\Repositories;

use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Repositories\ModelRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserRepository
{

    protected $modelRepository;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(ModelRepository $modelRepo)
    {
        $this->modelRepository = $modelRepo;
    }
    
    /**
     * Attempt to create an access token using user credentials
     *
     * @param string $email
     * @param string $password
     * @return \Illuminate\Http\JsonResponse
     */
    public function attemptLogin($request)
    {
        try {

            #check login credientials
            $user = $this->modelRepository->loginAttemptModel($request);

            if (is_null($user)) {
                return response()->json([
                    'status' => 0,
                    'message' => 'Unauthorized User'                    
                ]);
            } 
            
            if ( !Hash::check($request->password, $user->password) ) {

                return response()->json([
                    'status' => 0,
                    'message' => 
                        'Email Address and Password combination do not match our Records. Please try again.'
                ]);
            }
            if ( Hash::check($request->password, $user->password) && 
                $user->is_active == 0 ) {

                return response()->json([
                    'status' => 0,
                    'message' => 'In-acitve User.'
                ]);
            }

            #delete previous token
            $this->modelRepository->deleteToken($user->id);

            #create auth-token
            $user->oauth_token = $this->modelRepository->createToken($user);

            Log::info('login outputs - '. json_encode($user));

            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $user
            ]);

        } catch (\Exception $e) {
            Log::error('login attemptLogin - '.  $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Failed process....'
            ], 500);
        }
        
    }

    /**
     * logout user
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function attemptLogout($request)
    {
        try {

            #delete previous token
            $this->modelRepository->deleteToken($request->user()->id);

            return response()->json([
                'status' => 1,
                'message' => 'Success'
            ]);

        } catch (\Exception $e) {
            Log::error('attemptLogout - '.  $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Failed process....'
            ], 500);
        }
        
    }

    /**
     * Attempt to create an access token using user credentials
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userRegister($request)
    {
        try {

            #define user role while register
            $request->merge(['role_id' => 1]);
            //
            //Create user
            $user = $this->modelRepository->userRegisterModel($request);

            if (!$user) {
                Log::info('userRegister error - '. json_encode($user));
                return response()->json([
                    'status' => 0,
                    'message' => 'Failed process....'
                ]);
            }
            
            #create auth-token
            $user->oauth_token = $this->modelRepository->createToken($user);

            Log::info('userRegister outputs - '. json_encode($user));
            
            return response()->json([
                'status' => 1,
                'message' => 'Success',
                'data' => $user
            ]);

        } catch (\Exception $e) {
            Log::error('userRegister - '.  $e->getMessage());
            return response()->json([
                'status' => 0,
                'message' => 'Failed process....'
            ], 500);
        }
        
    }

    /**
     * Attempt to create an access token using user credentials
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userDetails($userID)
    {
        $user = $this->modelRepository->userDetails($userID);
        return $user;
    }

}