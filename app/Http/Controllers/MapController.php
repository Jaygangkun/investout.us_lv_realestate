<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateZipCodes;
use App\Zipcode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class MapController extends Controller
{
    public function excelToDatabase(){
            Log::info('Job working');
           UpdateZipCodes::dispatch();
            return redirect(route('envoy.index'))->with('success','process started');
    }

    public function getData(Request $request){
       $zip= Zipcode::where('zipcode',$request->zip)->first();
        return response()->json(['message'=>'zip details found','zip'=>$zip]);
    }
}
