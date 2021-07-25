<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(20);
        return view('videos.index')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'video' => 'required'
        ]);

        if($request->hasFile('video')) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('video')->getclientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('video')->storeAs('public/videos', $fileNameToStore);
        }

        $video = new Video;
        $video->title = $request->input('title');
        $video->user_id = auth()->user()->id;
        $video->video = $fileNameToStore;
    
        $video->save();
        return redirect('/videos');
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
        $video = Video::find($id);
        return view('videos.edit')->with('video', $video);
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
        $this->validate($request, [
            // 'title' => 'required',
            // 'video' => 'required'
        ]);

        $video = Video::find($id);

        if($request->hasFile('video')) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('video')->getclientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('video')->storeAs('public/videos', $fileNameToStore);
            
            $video->title = $request->input('title');
            $video->user_id = auth()->user()->id;
            $video->video = $fileNameToStore;
            $video->save();
            return redirect('/videos');
        } else {
            $video->title = $request->input('title');
            $video->user_id = auth()->user()->id;
            $video->save();
            return redirect('/videos');
        }

        
        // $video->title = $request->input('title');
        // $video->user_id = auth()->user()->id;
        // $video->video = $fileNameToStore;
        // $video->save();
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect('/videos');
    }
}