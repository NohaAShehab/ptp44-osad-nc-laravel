<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    private function saveImage($request){
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filepath=$image->store("images","tracks_uploads" );
            return $filepath;
        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks = Track::paginate(5);
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        # before this step we need to validate form inputs
//        request()->validate([]);
        $request->validate([
            'name'=>'required|min:2|unique:tracks',
            'about'=>'min:10'
        ], # customize error message
            [
            'name.required'=>'Track must have a name',
                'name.unique'=>'Track with this name already exists',
        ]
        );
        # if request has errors --> return to create page --> sharing the errors/ old data
//        via session

        $logo_path = $this->saveImage($request);
        $request_data = $request->all();
        $request_data['logo'] = $logo_path;
        $track = Track::create($request_data);
        return to_route('tracks.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
