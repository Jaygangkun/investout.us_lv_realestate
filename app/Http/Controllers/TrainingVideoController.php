<?php

namespace App\Http\Controllers;

use App\TrainingVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TrainingVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = TrainingVideo::where('type', 0)->orderBy('created_at', 'desc')->get();
        $allvideos = TrainingVideo::where('type', 0)->orderBy('created_at', 'desc')->first();

        return view('pages.training', compact('videos', 'allvideos'));
    }

    public function panelIndex()
    {
        if (auth()->user()->isEnterprise()) {
            $videos = TrainingVideo::orderBy('created_at', 'desc')->get();
        } else {
            $videos = TrainingVideo::where('type', 0)->orderBy('created_at', 'desc')->get();
        }
        $allvideos = TrainingVideo::orderBy('created_at', 'desc')->first();
        return view('commons.training', compact('videos', 'allvideos'));
    }

    public function search(Request $request)
    {
        if (auth()->user()) {
            if (auth()->user()->isEnterprise()) {
                $videos = TrainingVideo::where('description', 'Like', '%'.$request->input('name').'%')->orderBy('created_at', 'desc')->get();
            } else {
                $videos = TrainingVideo::where('description', 'Like', '%'.$request->input('name').'%')->where('type', 0)->orderBy('created_at', 'desc')->get();
            }
        } else {
            $videos = TrainingVideo::where('description', 'Like', '%'.$request->input('name').'%')->where('type', 0)->orderBy('created_at', 'desc')->get();
        }
        $allvideos = TrainingVideo::orderBy('created_at', 'desc')->first();
        if ($request->input('page') == 1) {
            return view('commons.training', compact('videos', 'allvideos'));
        } else {
            return view('pages.training', compact('videos', 'allvideos'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.training.training');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'description'=>'required|string|max:500',
        'thumbnail'=>'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        'video'=>'mimes:mp4,avi|max:20048'
        ]);

        $video =  new TrainingVideo();

        $video->description = $request->input('description');
        $video->type = $request->input('type');
        $image = $request->file('thumbnail');
        $image_name = time().'image.'.$image->getClientOriginalExtension();
        //$destinationPath = public_path('training/img/');
        $destinationPath = '/home/tyronejglover/public_html/training/img/';
        $image->move($destinationPath, $image_name);
        $video->image = $image_name;


        if ($request->file('video')) {
            $image = $request->file('video');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            //$destinationPath = public_path('training/video/');
            $destinationPath = '/home/tyronejglover/public_html/training/video/';
            $image->move($destinationPath, $image_name);
            $video->url = $image_name;
            $video->save();
            return redirect()->back()->with('vidsuc', 'Video Uploaded');
        } elseif ($request->input('link')) {
            $video->url = $request->input('link');
            $video->save();
            return redirect()->back()->with('vidsuc', 'Video Uploaded');
        }
        return redirect()->back()->with('vidsuc', 'Unable to upload the video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingVideo  $trainingVideo
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingVideo $trainingVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingVideo  $trainingVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingVideo $trainingVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingVideo  $trainingVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingVideo $trainingVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingVideo  $trainingVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingVideo $trainingVideo)
    {
        //
    }
}
