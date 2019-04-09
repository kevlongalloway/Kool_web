<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Login{

	public function login(Request $request, $guard){
		$route = "{$guard}.home"
		 $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        //get credentials
        $credentials = [
            'email' =>$request->email, 
            'password' => $request->password
        ];
        // attempt to log the user in 
        
        if(Auth::guard($guard)->attempt($credentials, $request->remember)){
            //if successful, redirect to their intended location
            return true;
        }
        
        return false;
	}

}