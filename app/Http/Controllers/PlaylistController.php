<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\User;
use App\Admin;
use App\Organization;
use App\Song;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource for currently logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = $this->getUser($id);
        $user->playlists == null ?$playlists = null : 
        $playlists = array_reverse($user->playlists->toArray());
        return response()->json($playlists);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user == null ? $user = Auth::guard('teacher')->user() : ''; 
        $user == null ? $user = Auth::guard('admin')->user() : ''; 
        $user == null ? $user = Auth::guard('organization')->user() : ''; 
        $user->playlists()->create($request->all());
        return response()->json(null,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::find($id);
        return response()->json($playlist);
    }

    public function showSongs($playlist_id){
        $songs = Playlist::find($playlist_id)->songs;
        return response()->json($songs);
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

    
    public function attachSongToPlaylist($playlist_id,$song_id){
        $playlist = Playlist::find($playlist_id);
        $song = Song::find($song_id);
        if (!$playlist->songs->contains($song)) 
        {
        $playlist->songs()->attach($song_id);
        }
        return response()->json(null,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();
        return response()->json(null,201);
    }


    protected function getUser($id){
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
}
