<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\User;


class ModelRepository {

    protected $currentDate;

    protected $userRepository;
    

    /**
     * Instantiate a new controller instance.
     *
     * @return void
    */
    public function __construct(
        User $user
        )
    {
        $this->currentDate = Carbon::now();
        $this->userRepository = $user;
    }

    /**
     * Attempt to create an access token using user credentials
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginAttemptModel($request)
    {
        return $this->userRepository->where('email', $request->email)
            ->first();
    }

    /**
     * Create a new applicant instance after a validation.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userRegisterModel($request)
    {
        #bcrypt password
        $request->merge(['password' => bcrypt($request->password)]);
        DB::beginTransaction();
        try {
            $users = $this->userRepository->create($request->all());
            Log::info("Users - ".$users);
            DB::commit();
            return $users;
        } catch (\Exception $e) {
            DB::rollback();
            return false;            
        }
    }


    /**
     * Delete token using user id
     *
     * @param $user_id
     * @return Boolean
     */
    public function deleteToken($user_id)
    {
        return DB::table('oauth_access_tokens')->where('user_id', '=', $user_id)
            ->delete();
    }

    /**
     * create oauth token
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createToken($request)
    {
        return $request->createToken('Desiflight')->accessToken;
    }

    /**
     * show user details.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userDetails($userID)
    {
        #show user details       
        $data = $this->userRepository->from('users As u')
            ->where('u.id', $userID)
            ->first();
        return $data;
    }

}
