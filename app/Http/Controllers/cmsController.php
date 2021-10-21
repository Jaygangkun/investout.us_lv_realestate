<?php

namespace App\Http\Controllers;

use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class cmsController extends Controller
{
    public function create($page)
    {
        $page =  CMS::where('id', $page)->first();
        return view('admin.cms.cms', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topimage'=>'image|mimes:jpeg,jpg,png,gif,svg',
            'textbelow'=>'string',
            'headingcontent'=>'string',
            'content'=>'string',
            'contentimage'=>'image|mimes:jpeg,jpg,png,gif,svg'
        ]);

        $content = CMS::where('id', $request->input('page'))->first();


        if ($request->file('topimage')) {
            $image = $request->file('topimage');
            $image_name = time().'topimg.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/cms/');
            $image->move($destinationPath, $image_name);
            $content->topimage = $image_name;
        }

        $content->textbelow = $request->input('textbelow');
        $content->headingcontent = $request->input('headingcontent');
        $content->content = $request->input('content');

        if ($request->file('contentimage')) {
            $image = $request->file('contentimage');
            $image_name = time().'contentimg.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/cms/');
            $image->move($destinationPath, $image_name);
            $content->contentimage = $image_name;
        }

        $content->save();

        return redirect()->back();
    }
}
