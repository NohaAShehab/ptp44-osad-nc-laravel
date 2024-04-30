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
        //
//        dd($request->all());
        $logo_path = $this->saveImage($request);

        # save data in model --> mass assignment
        $request_data = $request->all();
//        dd($request_data);
        $request_data['logo'] = $logo_path;
//        dd($request_data);
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
