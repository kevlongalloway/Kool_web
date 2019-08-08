<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Organization;
use \App\Http\Requests\AccessCodeRequest;
use \App\Http\Requests\RegisterRequest;
use App\Repository\Login;
use Illuminate\Support\Facades\Input;


class AccessCodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
 
    /**
     * handle an access code request
     * 
     * @param Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function accessCodeRequest(AccessCodeRequest $request)
    {   
        $guard = $this->resolveGuard($request); 
        $accesscode = $request->access_code;
        return redirect(url('registration/'.$guard.'/'.$accesscode));
    }

    /**
     * Show the register form.
     * 
     * @param access code, guard
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegisterForm($guard ,$accesscode){
        return view('teacher.auth.register',['guard'=>$guard,'access_code'=>$accesscode]);
    }


    public function register(RegisterRequest $request)
    {
        $guard = $request->guard;
        $route = "{$guard}.home";
        $e = new Login;
        $e->register($request);
        //get credentials
        $credentials = [
            'email' =>$request->email, 
            'password' => $request->password
        ];
        // attempt to log the user in 
        $guard == 'user' ? $guard = null: false;
        if(Auth::guard($guard)->attempt($credentials, $request->remember)){
            //if successful, redirect to their intended location
            return redirect(route($route));      
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }

    /**
     * check http refferrer to resolve guard
     * 
     * @param Request
     * @return String $guard
     */
    protected function resolveGuard(Request $request)
    {
        $referrer = $request->server('HTTP_REFERER');
        $teacherUrl = $request->server('HTTP_ORIGIN').'/portal';
        if ($referrer == $teacherUrl) {
                return 'teacher';
        }
        return 'user';
    }
}
