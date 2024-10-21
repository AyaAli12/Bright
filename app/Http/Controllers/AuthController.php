<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      //Register function to add new User 
    public function Register(UserRequest $request){
        try{
        $user = User::create([
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'Role'=>'User'
        ]);
        $token = $user->createToken('Register API Token')->plainTextToken ;
        $data['token'] = $token;
        return $this->sendResponse($data, " created Successfuly",200);
    }
    catch (\Exception $e) 
    { 
        return $this->sendResponse("ERROR. ". $e->getMessage(),500);
    } 
    }
    
    //Login Function
    public function login(UserRequest $request)
    {
        if(!Auth::attempt(['email'=>$request->email , 'password'=>$request->password]))
        {
            return $this->sendResponse("password or Email does not match",401);
        }
        $user = User::where('email',$request->email)->first();
    
        $token = $user->createToken("Login Token")->plainTextToken;
        $data['token'] = $token;
        return $this->sendResponse($data,"User Loged Successfully",200);
    }

    //logout function
    public function logout()
    {
        Auth::guard('web')->logout();

        return $this->sendResponse(auth()->user()->name,"Logedout Seccessfuly",200);
    
      }
}
