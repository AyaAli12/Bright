<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request)
    {
        try{
        $id=Auth::user()->id;
        $user=User::find($id);
        if($user){
        $user->update([
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'Role'=>'admin'

        ]);
        return $this->sendResponse('updated succefully',201);}
    }
    catch (\Exception $e) 
    { 
        return $this->sendResponse("ERROR. ". $e->getMessage(),500);
    } 
    }

}
