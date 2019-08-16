<?php

namespace App\Repository;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login
{

    public function login(Request $request, $guard)
    {
        $route = "{$guard}.home";

        //get credentials
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        // attempt to log the user in

        if (Auth::guard($guard)->attempt($credentials, $request->remember)) {
            //if successful, redirect to their intended location
            return redirect()->intended(route($route));

        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function register(Request $request)
    {
        $guard = $request->guard;
        if ($request->filled('access_code')) {
            $organization = Organization::find($request->access_code);
            $user         = $organization->resolveGuard($request->guard)->create($request->all());
        } else {
            $user            = \App\User::create($request->all());
            $user->is_active = 0;
        }

        $user->hashPassword($request);
    }

}
