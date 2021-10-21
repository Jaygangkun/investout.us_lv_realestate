<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class blogController extends Controller
{
    public function index($user)
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();
        return view('commons.blogging', compact('posts', 'allpost'));
    }

    public function show($user,$id){
        $post = BlogPost::where('id', $id)->first();        
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();        
        return view('commons.blogshow', compact('post', 'allpost'));        
    }

    public function outerIndex()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();
        return view('pages.blog', compact('posts', 'allpost'));
    }

    public function outerShow($id){
        $post = BlogPost::where('id', $id)->first();        
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();        
        return view('pages.blogshow', compact('post', 'allpost'));        
    }

    public function create()
    {
        $posts = BlogPost::all();

        return view('admin.blog.create',compact('posts'));
    }

    public function search(Request $request)
    {
        $posts = BlogPost::where('heading', 'Like', '%'.$request->input('name').'%')->orderBy('created_at', 'desc')->get();
        $allpost = BlogPost::orderBy('created_at', 'desc')->take(10)->get();
        if ($request->input('page') == 1) {
            return view('commons.blogging', compact('posts', 'allpost'));
        } else {
            return view('pages.blog', compact('posts', 'allpost'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'=>'required|string|max:255',
            'body'=>'required|string|max:2000',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $image = $request->file('image');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('//blogpost//');
        $image->move($destinationPath, $image_name);

        $post = new BlogPost();
        $post->heading = $request->heading;
        $post->description = $request->body;
        $post->image = $image_name;
        $post->save();

        return redirect()->back();
    }

    public function delete($id){
        BlogPost::where('id', $id)->delete();

        return redirect()->back();
    }

}
