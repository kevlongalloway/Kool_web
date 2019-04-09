<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Organization;
use \App\Http\Requests\AccessCodeRequest;
use \App\Http\Requests\RegisterRequest;
use App\Repository\Login;

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
     * Show the register form.
     * 
     * @param access code, guard
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegisterForm($guard,$accesscode){
    if($this->validateCode($accesscode)){
        return $this->validateRoute($guard) ?
        view('teacher.auth.register',compact('guard'))->with('access_code',$accesscode) :
        abort(404);
        }
        abort(404);

    }

    public function validateCode($accesscode){
        return Organization::find($accesscode) ? true : false;
    }

    public function validateRoute($guard){
        if($guard === 'teacher'){
            return true;
        }
        else if($guard === 'user'){
            return true;
        }

        return false;
    }

    // public function showRegisterForm($guard,$accesscode){
    //     return $guard === 'teacher' ? view('teacher.auth.register',compact('guard'))->with('access_code',$accesscode) : view('auth.register',compact('guard'))->with('access_code',$accesscode);
    // }

    public function register(RegisterRequest $request){
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
        
        if(Auth::guard($guard)->attempt($credentials, $request->remember)){
            //if successful, redirect to their intended location
            return redirect(route($route));      
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }



    public function handle(AccessCodeRequest $request){
        $access_code = $request->access_code;
        $guard = $request->guard;
        if(Organization::find($access_code)){
            switch($guard){
                case 'teacher':
                    return view('teacher.register',compact('guard'))->with('access_code',$access_code);
                break;
                case 'user':
                    return view('auth.register',compact('guard'))->with('access_code',$access_code);
                break;
            }

        }

    }
}
