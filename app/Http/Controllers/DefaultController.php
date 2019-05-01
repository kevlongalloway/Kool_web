<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index($any)
    {
        if(Auth::check()){
            if(Auth::user()){
                return redirect(url('/home'));
            } 
            if(Auth::guard('admin')->check()){
                return redirect(url('/admin/home'));
            }
            if(Auth::guard('teacher')->check()){
                return redirect(url('/portal/home'));
            }
             if(Auth::guard('organization')->check()){
                return redirect(url('/club/home'));
            }
        }
        return redirect(url('/'));
    }
}
