<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{
    public function loginProcess(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|min:8|max:100',
            'password' => 'required|min:8|max:30'
        ]);

        if($validator->fails()) {
            return $this->sendError($validator->errors(),'login validation failed');
        } else {
            $user = User::where(['email'=>$request->email])->first();
            if(!is_null($user)) {
                if(Hash::check($request->password, $user->password)) {
                    if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
                        if(Auth::check()) {
                            $loginUser = Auth::user();
                            $objToken = $loginUser->createToken(env('APP_API_TOKEN'));
                            $userDetails = $loginUser->only(['id','name','email']);
                            $token = $objToken->accessToken;

                            return $this->sendSuccess([
                                'user' => $userDetails,
                                'token' => $token
                            ],'user authenticated successfully');
                        }
                    } else {
                        return $this->sendError(null, 'authentication failed');
                    }
                } else {
                    return $this->sendError(null, 'credentials wrong');
                }
            } else {
                return $this->sendError(null,'record not found');
            }
        }
    }

    public function logoutProcess() {
        if(Auth::guard('api')->user()->tokens) {
            $user = Auth::guard('api')->user()->tokens->each(function($token,$key){
                $token->delete();
            });

            if(count($user)>0) {
                return $this->sendSuccess(null,'user logout successfully');
            }
        }
    }
}
