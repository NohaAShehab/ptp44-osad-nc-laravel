<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class TrackController extends Controller
{
    # only logged_in users can perform operations on tracks
    function __construct()
    {
        $this->middleware('auth');
    }


    private function  authorize_user($track){
        if (! Gate::allows('track_update_delete', $track)) {
            abort(403);
        }
    }
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


        $request->validate([
            'name'=>'required|min:2|unique:tracks',
            'about'=>'min:10'
        ], # customize error message
            [
            'name.required'=>'Track must have a name',
                'name.unique'=>'Track with this name already exists',
        ]
        );

        $logo_path = $this->saveImage($request);
        $request_data = $request->all();
        $request_data['owner_id']= Auth::id();
        $request_data['logo'] = $logo_path;
        $track = Track::create($request_data);
        return to_route('tracks.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Track $track)  # get object associated with this id
    {
        // dd(track)
        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
        $this->authorize_user($track);
        return view('tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        if (! Gate::allows('track_update_delete', $track)) {
            abort(403);
        }
            $updated_image= $this->saveImage($request);
            $request_data = $request->all();
            if ($updated_image){
                $request_data['logo'] = $updated_image;
            }

            $track->update($request_data);
            return to_route('tracks.show', $track);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //

        $track->delete();
        # don't forget to remove image
        return to_route('tracks.index');
    }
}
