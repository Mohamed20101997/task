<?php

namespace App\Http\Repositories\Api;

use App\Http\Interfaces\Api\AuthInterface;
use App\Http\Traits\ApiDesignTrait;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthRepository implements AuthInterface{

    use ApiDesignTrait;

    private $userModel;
    public function __construct(User $user)
    {
        $this->userModel = $user;
    }


    public function login($request)
    {

        $validation = Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required',
        ]);

        if($validation->fails())
        {
            return $this->ApiResponse(false , 'Validation Error', $validation->errors()->first());
        }
        $credentials = request(['email', 'password']);

        $token = auth()->guard('api')->attempt($credentials);

        if (!$token) {
            return $this->ApiResponse(422, 'your password or email its not correct');
        }

        return $this->respondWithToken($token);
    }



    protected function respondWithToken($token)
    {
        $userData =  $this->userModel->find(auth()->guard('api')->user()->id);
        $data = [
            'name' => $userData->name,
            'email' => $userData->email,
            'access_token' => $token,
        ];

        return $this->ApiResponse(true,'Done', null, $data);
    }

}
