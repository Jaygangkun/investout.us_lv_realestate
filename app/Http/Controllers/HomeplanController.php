<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeplanController extends Controller
{
    public function index()
    {
        return view('homeplans.index');
    }
}
