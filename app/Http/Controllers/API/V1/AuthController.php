<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use BaseApiTrait;

    public function login(Request $request){
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $auth_user              = auth()->user();
            $success['api_token']   = $auth_user->createToken('UseAnyStringHere')->plainTextToken();
            $success['name']        = $auth_user->name;

            return  $this->handleResponse($success, 'User logged in.');
        }else{
            return $this->handleError($this->apiDataNotAuthorized());
        }
    }

    public function register(Request $request){

        $validator  = Validator::make($request->all(), [
            'name'              => 'required',
            'email'             => 'required|email',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());
        }

        $input  = $request->all();
        $input['password']  = bcrypt($input['password']);
        $user   = User::create($input);
        $success['api_token']   = $user->createToken('UseAnyStringHere')->plainTextToken();
        $success['name']        = $user->name;

        return $this->handleResponse($success, 'User registered successfully.');

    }


}
