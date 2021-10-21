<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminDocument;

class DashboardController extends Controller
{
    public function showDocument()
    {
        $memtype = auth()->user()->membership_type;
        if ($memtype == 1) {
            $documents =  AdminDocument::where('userType', auth()->user()->roles()->first()->id)->get();
        } else {
            $documents =  AdminDocument::where('type', 0)->where('userType', auth()->user()->roles()->first()->id)->get();
        }
        return view('commons.document.admin-document', compact('documents'));
    }
}
