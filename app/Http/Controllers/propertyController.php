<?php

namespace App\Http\Controllers;

use App\Property;
use App\Proposal;
use App\PropertyProposal;
use App\PropertyInfo;
use App\PropertyItem;
use App\PropertyImage;
use App\PropertyVideo;
use GuzzleHttp\Client;
use App\PropertyDetail;
use App\PropertyDocument;
use Illuminate\Http\Request;
use App\Http\Requests\propertyStore;
use Illuminate\Support\Facades\Session;
use DB;

class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('user_id', auth()->user()->id)->get();
        if (count($properties) == 1) {
            $property = Property::where('user_id', auth()->user()->id)->first();            
            return view('seller.property.oneproperty', compact('property'));            
        }
        return view('seller.property.property-index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procount =  Property::where('user_id', auth()->user()->id)->count();

        // check for seller account
        if (!auth()->user()->isEnterpise() && auth()->user()->roles()->first()->id == 1 && $procount == 1) {
            Session::put('member', 'Basic members can create only one listing. Please Buy An Enterprise Membership');
            return redirect(route('membership.show', auth()->user()->roles()->first()->slug));
        } elseif (!auth()->user()->isEnterpise() && auth()->user()->roles()->first()->id == 2) {
            Session::put('member', 'In order to create listings you will have to Buy an Enterprise Membership');
            return redirect(route('membership.show', auth()->user()->roles()->first()->slug));
        }
        return view('seller.property.property-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(propertyStore $request)
    {

        // to fetch and store the basic info about a property
        $propertyKeys = ['address','city','zip','state'];
        // return dd($request->input())

        $client = new Client();
        $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('address').",". $request->input('city').",". $request->input('state') ." ". $request->input('zip')."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
        $apires = json_decode($res->getBody());
        $propertyData = $request->all($propertyKeys);
        $propertyData['user_id'] = auth()->user()->id;
        $propertyData['lat'] = $apires->results[0]->geometry->location->lat;
        $propertyData['long'] = $apires->results[0]->geometry->location->lng;
        $property = Property::create($propertyData);

        // to fetch and store the items present in a property
        $propertyItemKeys = ['burglar_alarm','smoke_detector','fire_alarm','central_air','central_heating'
                              ,'window_ac','dishwasher','trash_compactor','garbage_disposal','oven','microwave'
                              ,'tv_antenna','satelite_dish','intercom_system','pool','washer_dryer','hot_tub','washer'
                              ,'dryer','refrigerator','pool_barrier','safety_cover_hottub'];
        $propertyItemData = $request->all($propertyItemKeys);
        foreach ($propertyItemData as $key => $value) {
            if ($propertyItemData[$key] == 'on') {
                $propertyItemData[$key] = 1;
            } else {
                $propertyItemData[$key] = 0;
            }
        }
        $propertyData['property_id'] = $property->id;
        PropertyItem::create($propertyItemData);

        // to fetch and store the property questions

        $all_keys = array_merge($propertyKeys, $propertyItemKeys);
        $all_keys[] = '_token';
        $propertyInfoData = $request->except($all_keys);
        $propertyInfoData['property_id'] = $property->id;
        PropertyInfo::create($propertyInfoData);
        PropertyDetail::create(['property_id'=>$property->id]);

        return redirect(route('seller.property.edit', $property->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (isset($property)) {
            return view('seller.property.property-show', compact('property'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if (isset($property)) {
            return view('seller.property.property-edit', compact('property'));
        } else {
            return redirect()->back();
        }
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
        $property = PropertyDetail::where('property_id', $id)->first();
        if ($property->acceptance_level == 2) {
            Session::put('acceptance', 'You can not edit your property as it is under Property Evaluation Phase');
            return redirect()->back();
        }
        $data = $request->except(['_token','_method','video','property_state']);

        if ($request->input('property_state')) {
            Property::where('id', $id)->update(['property_state'=>$request->input('property_state')]);
        }

        if ($request->input('video')[0] != null) {
            foreach ($request->input('video') as $key => $value) {
                PropertyVideo::create(['property_id'=>$id,'video'=>$value]);
            }
        }
        PropertyDetail::where('property_id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contentUpload(Request $request, $propertyId)
    {
        $type = $request->file('file')->getClientOriginalExtension();


        if ($type=='jpg'||$type=='png'||$type=='gif'||$type=='jpeg') {
            $imageName = rand(111111, 999999) .'_'.time().'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('properties/'.$propertyId.'/images/'), $imageName);
            $image = PropertyImage::create(['property_id'=>$propertyId,'image'=>$imageName]);
            //
            return  response()->json(['success'=>$imageName]);
        } elseif ($type=='doc'||$type=='docx'||$type=='pdf'||$type=='txt') {
            $docName = rand(111111, 999999) . '_'.time().'.'.$request->file('file')->getClientOriginalExtension();
            $request->file('file')->move(public_path('properties/'.$propertyId.'/documents/'), $docName);
            $doc = PropertyDocument::create(['property_id'=>$propertyId,'document'=>$docName]);

            return  response()->json(['success'=>$docName]);
        } else {
            return  response()->json(['error'=>'Cant upload this file']);
        }
    }

    public function viewedProperties(){
        $user_id = auth()->user()->id;
        $OwnerDetails = DB::table('owner_details')
            ->join('properties','properties.id','=','owner_details.peroperty_id')
            ->join('users','users.id','=','properties.user_id')
            ->join('profiles','profiles.user_id','=','users.id')
            ->select('properties.address','properties.id','properties.city','properties.state','properties.zip','users.first_name','users.last_name','users.email','profiles.phone')
            ->where('owner_details.user_id','=',$user_id)
            ->get();

        return view('commons.owner_details', compact('OwnerDetails'));
    }

    public function contractedProperties(){
        $user_id = auth()->user()->id;
        // $ContractedProperties = Proposal::where('user_id',$user_id)->where('status',1)->get();
        $ContractedProperties = PropertyProposal::select('properties.id as property_id', 'properties.address', 'properties.city', 'properties.state', 'properties.zip', 'property_proposals.id', 'users.id', 'users.first_name', 'users.last_name', 'users.email', 'profiles.phone')
                            ->join('properties', 'properties.id', '=', 'property_proposals.property_id')
                            ->join('users', 'users.id', '=', 'properties.user_id')
                            ->join('profiles', 'users.id', '=', 'profiles.user_id')
                            ->where(['is_accepted' => "1"])
                            ->where(function ($query) use ($user_id) {
                                $query->where(['from_user' => $user_id])
                                    ->orWhere(['to_user' => $user_id]);
                            })->get();
        
        return view('commons.contracted_properties', compact('ContractedProperties'));
    }
}
