<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use \App\Http\Requests\AccessCodeRequest;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function handle(AccessCodeRequest $request){
        $access_code = $request->access_code;
        $guard = $request->guard;
        if(Organization::find($access_code)){
            switch($guard){
                case 'teacher':
                    return view('teacher.register')->with('access_code',$access_code);
                break;
                case 'user':
                    return view('auth.register')->with('access_code',$access_code);
                break;
            }

        }

    }
}
