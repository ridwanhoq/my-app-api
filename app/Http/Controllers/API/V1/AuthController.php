<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    use BaseApiTrait;

    // public function login(Request $request)
    // {
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
    //         $auth = Auth::user(); 
    //         $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken; 
    //         $success['name'] =  $auth->name;
   
    //         return $this->handleResponse($success, 'User logged-in!');
    //     } 
    //     else{ 
    //         return $this->handleError('Unauthorised.', ['error'=>'Unauthorised']);
    //     } 
    // }

    public function login(Request $request){
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            $auth_user              = auth()->user();
            $success['api_token']   = $auth_user->createToken('UseAnyStringHere')->plainTextToken;
            $success['name']        = $auth_user->name;

            return  $this->handleResponse($success, 'User logged in.');
        }
    }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'confirm_password' => 'required|same:password',
    //     ]);
   
    //     if($validator->fails()){
    //         return $this->handleError($validator->errors());       
    //     }
   
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
    //     $success['name'] =  $user->name;
   
    //     return $this->handleResponse($success, 'User successfully registered!');
    // }
}
