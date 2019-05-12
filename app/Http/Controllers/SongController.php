<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Grade;
use Storage;
use Illuminate\Support\Facades\Auth;


class SongController extends Controller
{
    protected $grades = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
            'ten' => 10,
            'eleven' => 11,
            'twelve' => 12,
            'kinder' => 13
        ];
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
        if(Auth::guard('admin')->check()) {
        $song = Song::create($request->except('file'));
        $this->attachGrades($song,$request);
        $request->file->store('media', 'dropbox');
        //$this->storeFile($request);
        $this->storeRawSongData($song);

        return response()->json(['message' => $song->title.' has successfully been uploaded!'],201);
        }
        return response()->json(null,404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($song)
    {
        return response()->json($song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($song)
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

    protected function attachGrades($song, $request){
        foreach($request->grades as $key => $grade){
            $song->grades()->attach($this->grades[$key]);
        }
    }

    protected function storeRawSongData($song){
        if(Storage::exists('songs.txt')){
         Storage::append('songs.txt',[$song, $song->grades()->pluck('grade_id')]);
        }else{
            Storage::put('songs.txt',[$song, $song->grades()->pluck('grade_id')]);
        }

    }

    protected function storeFile($request){
        dd($request->file('file'));
        if($request->hasFile('file')){
            // Get filename with the extension

            $filenameWithExt = $request->file('file');

            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getOriginalClientExtension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('file')->storeAs('storage/app/content/',$filenameToStore);
            dd($path);
        }
    }
}
