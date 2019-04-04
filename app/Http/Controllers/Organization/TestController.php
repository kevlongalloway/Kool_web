<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Organization;
use App\Classroom;
use App\User;
use Facades\App\Repository\Users;
/*TEST*/
use Illuminate\Support\Str;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('test');
    }

    public function store(Request $request){
        $org = Organization::find(1);
        $org->addUser($request);
        return $org->users;
    }

    public function test(){
        $class = new Classroom;
        $class->save();
        $class->users()->attach(1);
        return $class->users;
    }

    public function run(){
        return view('test');
    }

    public function api(){
    $users =  User::orderBy('name','desc')->paginate(10);
    return response()->json($users);
    }

    public function customClassExample(){
        return $users = Users::all('id');
    }



}
