<?php

namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Organization;


class Login{

	public function login(Request $request, $guard){
		$route = "{$guard}.home";

        //get credentials
        $credentials = [
            'email' =>$request->email, 
            'password' => $request->password
        ];
        // attempt to log the user in 
        
        if(Auth::guard($guard)->attempt($credentials, $request->remember)){
            //if successful, redirect to their intended location
            return redirect()->intended(route($route)); 
             
             
        }
        
       return redirect()->back()->withInput($request->only('email', 'remember'));
	}

    public function register(Request $request){
        $guard = $request->guard;
        $organization = Organization::find($request->access_code);
        $teacher = $organization->resolveGuard($request->guard)->create($request->all());
        $teacher->hashPassword($request);
    }

}