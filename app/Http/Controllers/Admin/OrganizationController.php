<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Organization;

class OrganizationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $organizations =  Organization::orderBy('name','desc')->paginate(10);
        return response()->json($organizations);
    }

    public function show(Organization $organization){
        return $organization;
    }

    public function store(Request $request){
        $organization  = Organization::create($request->all());
        return response()->json($organization, 201);
    }

    public function update(Request $request, Organization $organization){
        $organization->update($request->all());
        return response()->json(null,204);
    }

    public function delete(Organization $organization){
        $organization->delete();
        return response()->json(null, 204);
    }
}    

