<?php

namespace App\Http\Controllers;

use DB;
use App\State;
use App\County;
use App\Zipcode;
use App\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        $query = trim($request->get('q'), ',');
        $query = trim($query);
        return Property::search($query)->with('images')->get();
    }

    public function findState(Request $request)
    {
        $query = trim($request->get('q'));
        return Zipcode::search($query)->get();
    }


    public function customSeach(Request $request)
    {
        $latitude = '';
        $longitude = '';
        $distance = $request->input('distance');
        $property = Property::where('acceptance_level', 5)->where('approved', 1)->where('property_state', '=', 0);

        if ($request->input('brpricemin')) {
            $param = $request->input('brpricemin');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('brv_price', '>=', $param);
            });
        }

        if ($request->input('brpricemax')) {
            $param = $request->input('brpricemax');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('brv_price', '<=', $param);
            });
        }

        if ($request->input('arpricemin')) {
            $param = $request->input('arpricemin');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('arv_price', '>=', $param);
            });
        }

        if ($request->input('arpricemax')) {
            $param = $request->input('arpricemax');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('arv_price', '<=', $param);
            });
        }

        if ($request->input('investmentmin')) {
            $param = $request->input('investmentmin');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('investment_price', '>=', $param);
            });
        }

        if ($request->input('investmentmax')) {
            $param = $request->input('investmentmax');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('investment_price', '<=', $param);
            });
        }
        /*
        if ($request->input('zipcode')) {
            $param = $request->input('zipcode');
            $property->where('zip', '=', $param);
        }
        */
        if ($request->input('state') && $request->input('state') != '') {
            $property->where('state', 'like', '%'.$request->input('state').'%');
        }

        if ($request->input('county') && $request->input('county') != '') {
            $param = $request->input('county');
            $property->whereHas('detail', function ($query) use ($param) {
                $query->Where('county', 'like', '%'.$param.'%');
            });
        }
        
        if($request->input('zipcode') != '' && $request->input('county') != '' && $request->input('state') != '' && $request->input('distance') != ''){
            $zipcode = ltrim($request->input('zipcode'), "0");
            $latlong = DB::table('zip_lat_long')
                ->where('zip_code',$zipcode)
                ->where('state',$request->input('state'))
                ->where('county',$request->input('county'))
                ->select('latitude', 'longitude')
                ->first();
            if(!empty($latlong)){
                $latitude = $latlong->latitude;
                $longitude = $latlong->longitude;
            }
        }

        $properties = $property->get();
        //dd($properties);
        $zipcodes = Zipcode::all();
        $states = State::orderBy('state','asc')->get();
        $counties = County::orderBy('county','asc')->get();
        
        return view('investor.index', compact('properties', 'zipcodes', 'states', 'counties','latitude','longitude','distance','request'));
    }
}
