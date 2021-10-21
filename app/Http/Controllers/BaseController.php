<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class BaseController extends Controller
{
    //
    public function index()
    {
      return view('index');
    }

    public function approvePropertyFromMail(Request $request, $id)
    {
        $property = Property::where('id', $id)->first();
        $property->approved = 1;
        $property->approved_date = \Carbon\Carbon::now();
        $property->acceptance_level = 5;
        $property->property_state = 0;
        $property->save();    
        echo "<h1>Property Approved</h1>";
        die();
    }
}
