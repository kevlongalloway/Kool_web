<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function user()
    {
        $user                 = Auth::user();
        $user == null ? $user = Auth::guard('teacher')->user() : '';
        $user == null ? $user = Auth::guard('organization')->user() : '';
        $user == null ? $user = Auth::guard('admin')->user() : '';
        return response()->json($user);
    }

}
