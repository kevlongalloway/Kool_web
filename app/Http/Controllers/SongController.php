<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Grade;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return response()->json($songs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function browse($grade,$subject){
       $grade = Grade::find($grade);
       return response()->json($grade->songs);
    }

    protected function subjectID($subject){
        switch($subject){
            case 'ELA' || 'ela' || 'Ela':
            return 1;
            break;
            case 'Math' || 'math':
            return 2; 
            break;
            case 'science' || 'Science':
            return 3;
            break;
            case 'Social-Studies' || 'social-studies':
            return 4;
            break;

        }
    }
}
