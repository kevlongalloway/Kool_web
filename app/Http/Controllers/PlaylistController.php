<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use Illuminate\Support\Facades\Auth;
use App\Teacher;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource for currently logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = $this->getUser()->playlists;
        return response()->json($playlists);
    }

    public function getUser($id){
        if (Auth::guard('admin')->check()) {
            return Admin::find($id);
        }
        else if (Auth::guard('teacher')->check()) {
            return Teacher::find($id);
        }
        else if (Auth::guard('organization')->check()) {
            return Organization::find($id);
        }
        else if (Auth::guard()->check()) {
            return User::find($id);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->playlists()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($playlist)
    {
        return response()->json($playlist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($playlist)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $playlist)
    {
        $playlist->update($request->all());
        return response()->json(null,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($playlist)
    {
        $playlist->delete();
        return response()->json(null,201);
    }
}
