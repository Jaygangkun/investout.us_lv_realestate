<?php

namespace App\Http\Controllers;
use App\Zipcode;
use http\Client;
use Illuminate\Http\Request;
use App\StripePlan;
use DB;
use App\Property;
use Auth;
use App\Realtor;
use App\User;
use App\NewsletterSubscriber;
use Spatie\Geocoder\Facades\Geocoder;

class frontendController extends Controller
{
    public function seller_index()
    {
        
        // DB::table('user_plans')->delete(11);
        // dd(DB::table('roles')->select('*')->get(), DB::table('stripe_plans')->select('*')->get(), DB::table('user_plans')->select('*')->get());
        // dd(DB::table('stripe_plans')->select('*')->get());
        $plans = DB::table('stripe_plans')
            ->join('user_plans', 'user_plans.plan_id', '=', 'stripe_plans.id')
            ->select('stripe_plans.*')
            ->where('user_plans.status', '1')
            ->whereIn('stripe_plans.role', ['1', '10'])
            ->where('stripe_plans.is_visible', '1')
            ->orderBy('amount','asc')
            ->orderBy('role','asc')
            ->get();
        //$plans = StripePlan::where('role', '=', 1)->get();
    	return view('front_end.pages.seller', compact('plans'));
    }

    public function how_it_works_index()
    {
    	return view('front_end.pages.how_it_works');
    }
    public function investor_index()
    {
        $plans = DB::table('stripe_plans')
            ->join('user_plans', 'user_plans.plan_id', '=', 'stripe_plans.id')
            ->select('stripe_plans.*')
            ->where('user_plans.status', '1')
            ->where('stripe_plans.is_visible', '1')
            ->where(function ($query) {
                $query->where('stripe_plans.role', '=', 3)
                ->orWhere('stripe_plans.role', '=', 7);
            })
            ->orderBy('role','asc')
            ->orderBy('amount','asc')
            ->get();

        return view('front_end.pages.investor', compact('plans'));
    }

    public function subscription_index()
    {
        $plans = array();
        $plansdata = DB::table('stripe_plans')
            ->join('roles', 'roles.id', '=', 'stripe_plans.role')
            ->join('user_plans', 'user_plans.plan_id', '=', 'stripe_plans.id')
            ->select('stripe_plans.*')
            ->where('user_plans.status', '1')
            ->get();
        foreach($plansdata as $plan){
            $arr = array();
            $arr['id'] = $plan->id;
            $arr['plan_id'] = $plan->plan_id;
            $arr['plan_name'] = $plan->plan_name;
            $arr['amount'] = $plan->amount;
            $arr['interval'] = $plan->interval;
            $arr['role'] = $plan->role;
            $arr['features'] = array();

            $features = DB::table('plan_features')
                ->join('features', 'features.id', '=', 'plan_features.feature_id')
                ->select('features.id','features.name','plan_features.value')
                ->where('plan_features.plan_id',$arr['id'])
                ->get();

            foreach ($features as $feature) {
                $arr2 = array();
                $arr2['id'] = $feature->id;
                $arr2['name'] = $feature->name;
                $arr2['value'] = $feature->value;
                array_push($arr['features'],$arr2);
            }
            array_push($plans,$arr);
        }
        return view('front_end.pages.subscription', compact('plans'));
    }

    public function training_index()
    {     
        return view('front_end.pages.training');
    }

    public function realtor_index()
    {
        $plans = DB::table('stripe_plans')
            ->join('user_plans', 'user_plans.plan_id', '=', 'stripe_plans.id')
            ->select('stripe_plans.*')
            ->where('user_plans.status', '1')
            ->where('stripe_plans.is_visible', '1')
            ->where(function ($query) {
                $query->where('stripe_plans.role', '=', 6)
                ->orWhere('stripe_plans.role', '=', 2);
            })
            ->orderBy('role','asc')
            ->orderBy('amount','asc')
            ->get();
        //$plans = StripePlan::where('role', '=', 6)->get();
        return view('front_end.pages.realtor', compact('plans'));
    }

    public function contact_index()
    {
        return view('front_end.pages.contact');
    }

    public function terms_of_use_index()
    {
        return view('front_end.pages.terms_and_conditions');
    }
    
    public function property_lists(Request $request)
    {
        $properties = Property::orderBy('id','DESC')
            ->limit(3)
            ->get();
        return view('front_end.pages.property_lists', compact('properties'));
    }

    public function keywordSearch(Request $request){


        $properties = Property::select('properties.*','properties.id as propertiesID','property_details.*','property_details.id as property_detailsID','property_details.id as property_detailsID')
            ->join('property_details', 'property_details.property_id','=','properties.id');
            

        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            $properties = $properties->where('properties.address', 'LIKE', "%{$keyword}%");
        }
        

        if ($request->has('intvt_price')) {
            $intvt_price = $request->intvt_price;
            $arr = explode(' - ', $intvt_price);
            $start = str_replace("$","",$arr[0]);
            $end = str_replace("$","",$arr[1]);
            $properties = $properties->whereBetween('property_details.investment_price', array($start, $end));
            
        }

        if ($request->has('arv_price')) {
            $arv_price = $request->arv_price;
            $arr = explode(' - ', $arv_price);
            $start = str_replace("$","",$arr[0]);
            $end = str_replace("$","",$arr[1]);
            
            $properties = $properties->whereBetween('property_details.arv_price', array($start, $end));
        }      

        if ($request->has('brv_price')) {
            $brv_price = $request->brv_price;
            $arr = explode(' - ', $brv_price);
            $start = str_replace("$","",$arr[0]);
            $end = str_replace("$","",$arr[1]);
            
            $properties = $properties->whereBetween('property_details.brv_price', array($start, $end));
        }      

        if($request->has('id')){
            $id = $request->id;
            if($id > 0){
                $properties = $properties->where('properties.id','<',$id);
            }
        }

        $properties = $properties->orderBy('propertiesID','DESC');
        $properties = $properties->limit(3)->get();
        
        //$query = $properties->limit(3)->toSql();
        //$distance = $request->latitude.":".$request->longitude.":".$properties[0]->lat.":".$properties[0]->long.":".$this->distance($request->latitude,$request->longitude,$properties[0]->lat,$properties[0]->long,'K');
        // /return response()->json(['status' => true, 'data' => $query, 'req' => $request]);
        
        $html='';
        if(!$properties->isEmpty())
        {        
            foreach ($properties as $property) {
                $distance = $this->distance($request->latitude,$request->longitude,$property->lat,$property->long,'K');
                $distance = number_format((float)$distance, 2, '.', '');

                    if($request->rangeinkm == 0 || $request->rangeinkm == ''){
                        if(isset($property->images()->first()->image)){
                            $image = $property->images()->first()->image;
                            if(!file_exists('properties/'.$property->propertiesID.'/images/'.$image))
                            {
                                $src = asset("property/assets/img/property-1.jpg");
                                $image = '';
                            }
                            foreach ($property->images()->get() as $img ){
                                if($img->is_cover_image == 1){
                                    $image = $img->image;
                                    if(!file_exists('properties/'.$property->propertiesID.'/images/'.$image))
                                    {
                                        $src = asset("property/assets/img/property-1.jpg");
                                        $image = '';
                                    }
                                }
                            }
                            if($image != ''){
                                $src = asset('properties/'.$property->propertiesID.'/images/'.$image);
                            }
                        }
                        else{
                            $src = asset("property/assets/img/property-1.jpg");
                        }
                        $html.='<div class="col-md-4"><div class="card-box-a card-shadow"><div class="img-box-a"><img src='.$src.' alt="" class="img-a img-fluid" style="object-fit:cover;height: 450px;"></div><div class="card-overlay"><div class="card-overlay-a-content"><div class="card-header-a"><h2 class="card-title-a"><div class="collapse" id="collapseExample'.$property->propertiesID.'"><div class="card card-body">'.$property->address.'</div></div></h2></div><div class="card-body-a"><div class="price-box d-flex"><span class="price-a">Investment Prce | $ '. $property->investment_price .'</span></div><a href='. route("property_single_page",['pid'=>$property->propertiesID]) .' class="link-a">  Click here to view <span class="ion-ios-arrow-forward"></span> </a></div><div class="card-footer-a"><ul class="card-info d-flex justify-content-around"><li><h4 class="card-info-title">ARV Price </h4><span>'. $property->arv_price .'</span></li><li><h4 class="card-info-title">BRV Price </h4><span>'. $property->brv_price .'</span></li><li><h4 class="card-info-title">Distance </h4><span>'. $distance .'KM</span></li></ul></div></div></div></div></div>';
                    }
                    else{
                        if($distance <= $request->rangeinkm){
                            if(isset($property->images()->first()->image)){
                                $image = $property->images()->first()->image;
                                foreach ($property->images()->get() as $img ){
                                    if($img->is_cover_image == 1){
                                        $image = $img->image;
                                    }
                                }
                                $src = asset('properties/'.$property->propertiesID.'/images/'.$image);                    
                            }
                            else{
                                $src = asset("property/assets/img/property-1.jpg");
                            }
                            $html.='<div class="col-md-4"><div class="card-box-a card-shadow"><div class="img-box-a"><img src='.$src.' alt="" class="img-a img-fluid" style="object-fit:cover;height: 450px;"></div><div class="card-overlay"><div class="card-overlay-a-content"><div class="card-header-a"><h2 class="card-title-a"><div class="collapse" id="collapseExample'.$property->propertiesID.'"><div class="card card-body">'.$property->address.'</div></div></h2></div><div class="card-body-a"><div class="price-box d-flex"><span class="price-a">Investment Prce | $ '. $property->investment_price .'</span></div><a href='. route("property_single_page",['pid'=>$property->propertiesID]) .' class="link-a">  Click here to view <span class="ion-ios-arrow-forward"></span> </a></div><div class="card-footer-a"><ul class="card-info d-flex justify-content-around"><li><h4 class="card-info-title">ARV Price </h4><span>'. $property->arv_price .'</span></li><li><h4 class="card-info-title">BRV Price </h4><span>'. $property->brv_price .'</span></li><li><h4 class="card-info-title">Distance </h4><span>'. $distance .'KM</span></li></ul></div></div></div></div></div>';
                        }
                    }
                }
                if($html != ''){
                    $html .= '<div id="remove-row" class="rm-row col-md-12">
                            <button style="width: 15%;margin-bottom:40px;" data-id="'.$property->id.'" class="filter-data btn site-btn m-b-sm nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>
                        </div>';
                }
            return response()->json(['status' => true, 'data' => $html]);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Not found!']);
        }
    }

    public function getOwnerDetails(Request $request){
        $property_id = $request->id;
        $user_detail = auth()->user();
        $ids = '';
        $html = '';
        if(!empty($user_detail)){
            $current_user_role = $user_detail->roles->first()->name;
            $user_id = $user_detail->id;

            $prop = Property::select('properties.user_id')
                ->where('properties.id', $property_id)
                ->first();

            $user = User::select('users.first_name','users.last_name','users.email','profiles.phone')
                ->join('profiles', 'profiles.user_id','=','users.id')
                ->where('users.id', $prop->user_id)
                ->first();


            if($current_user_role == 'Brokerage House' || $current_user_role == 'Realtor'){
                if($current_user_role == 'Brokerage House'){
                    $propertiesIDs = Realtor::select('properties.id')
                        ->join('properties', 'properties.user_id','=','realtor_id')
                        ->where('realtors.brokeragehouse_id', $user_id)
                        ->where('realtors.status', 1)
                        ->get();
                }
                else{
                    $brokeragehouseID = Realtor::select('brokeragehouse_id')
                        ->where('realtor_id', $user_id)
                        ->where('status', 1)
                        ->first();
                    if(!empty($brokeragehouseID)){
                        $propertiesIDs = Realtor::select('properties.id')
                            ->join('properties', 'properties.user_id','=','realtors.realtor_id')
                            ->where('realtors.brokeragehouse_id', $brokeragehouseID->brokeragehouse_id)
                            ->where('realtors.status', 1)
                            ->get();
                    }
                    else{
                        $propertiesIDs = Property::select('id')
                            ->where('user_id','=',$user_id)
                            ->get();
                    }
                }

                $i = 1;
                foreach($propertiesIDs as $propertiesID){
                    if($i == 1){
                        $ids = $propertiesID->id;
                    }
                    else{
                        $ids .= ",".$propertiesID->id;   
                    }
                    $i++;
                }

                $IDS = explode(',',$ids);
                if (in_array($property_id, $IDS)){
                    $html .= "
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-12'>Name</div>
                            <div class='col-md-12'>".$user->first_name." ".$user->last_name."</div>
                        </div>
                        <hr>
                        <div class='col-md-12'>
                            <div class='col-md-12'>Email</div>
                            <div class='col-md-12'>".$user->email."</div>
                        </div>
                        <hr>
                        <div class='col-md-12'>
                            <div class='col-md-12'>Phone</div>
                            <div class='col-md-12'>".$user->phone."</div>
                        </div>
                    </div>";
                }
                else{
                    //return response()->json(['data' => 'Your pack dose not include to view property owner details!']);
                    return response()->json(['data' => 'Looks like your account doesn\'t have the privilage to look at Property contact details. Please join Us as <a href="' . route('investor_index') . '">Invester</a> or <a href="' . route('seller_index') . '">Home Seller</a>']);
                }
                return response()->json(['data' => $html]);
            }
            else{
                if($current_user_role != 'Admin'){
                    if($user_id != $prop->user_id){
                        $Userplanfeatures = DB::table('user_plan_features')
                            ->select('*')
                            ->where('user_id','=',$user_id)
                            ->where('feature_id','=','3')
                            ->groupBy(['feature_id','plan_id'])
                            ->orderBy('id','desc')
                            ->first();
                        //dd($Userplanfeatures);


                        $OwnerDetailsNew = DB::table('owner_details')
                            ->select('id')
                            ->where('user_id','=',$user_id)
                            ->where('peroperty_id','=',$property_id)
                            ->first();

                        $html = "";

                        if(empty($OwnerDetailsNew)){
                            if(!empty($Userplanfeatures)){$user_plan_feature_id = $Userplanfeatures->id;}else{$user_plan_feature_id = 0;}
                            
                            DB::table('owner_details')->insert(
                                ['peroperty_id' => $property_id, 'user_id' => $user_id, 'user_plan_feature_id' => $user_plan_feature_id]
                            );
                            $html = "<div style='color:green;text-align: center;padding: 10px;font-weight: bold;background: rgba(0,255,0,0.2);border-radius: 10px;margin-bottom: 10px;'>This details are saved in your dashboard.</div>";
                        }

                        $html .= "
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Name</div>
                                <div class='col-md-12'>".$user->first_name." ".$user->last_name."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Email</div>
                                <div class='col-md-12'>".$user->email."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Phone</div>
                                <div class='col-md-12'>".$user->phone."</div>
                            </div>
                        </div>";
                    }
                    else{
                        $html .= "
                        <div class='row'>
                            <div class='col-md-12'>You are the owner of this property!</div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Name</div>
                                <div class='col-md-12'>".$user->first_name." ".$user->last_name."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Email</div>
                                <div class='col-md-12'>".$user->email."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Phone</div>
                                <div class='col-md-12'>".$user->phone."</div>
                            </div>
                        </div>";
                    }
                }
                else{

                    $html = "";

                    $html .= "
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='col-md-12'><i class='fa fa-user'></i> Name</div>
                            <div class='col-md-12'>".$user->first_name." ".$user->last_name."</div>
                        </div>
                        <hr>
                        <div class='col-md-12'>
                            <div class='col-md-12'><i class='fa fa-envelope'></i> Email</div>
                            <div class='col-md-12'>".$user->email."</div>
                        </div>
                        <hr>
                        <div class='col-md-12'>
                            <div class='col-md-12'><i class='fa fa-phone'></i> Phone</div>
                            <div class='col-md-12'>".$user->phone."</div>
                        </div>
                    </div>";
                }
                return response()->json(['data' => $html]);
            }
        }
        else{
            return response()->json(['data' => 'You are not logged in, Please <a href="'.route('login').'">Login</a> OR sign up as <a href="' . route('seller_index') . '">Home owner</a> or <a href="' . route('investor_index') . '">Invester</a> and try again!']);
        }
    }

    public function getOwnerDetailsold(Request $request){

        $property_id = $request->id;
        $user_detail = auth()->user();
        $current_user_role = $user_detail->roles->first()->name;
        if(!empty($user_detail)){
            $user_id = $user_detail->id;
            $user = Property::select('users.first_name','users.last_name','users.email','profiles.phone')
                ->join('users', 'users.id','=','properties.user_id')
                ->join('profiles', 'profiles.user_id','=','users.id')
                ->where('properties.id', $property_id)
                ->first();

            if($current_user_role != 'Admin'){
                

                if($current_user_role == 'Brokerage House'){
                    $propertiesID = Realtor::select('properties.id')
                        ->join('properties', 'properties.user_id','=','realtor_id')
                        ->where('realtors.brokeragehouse_id', $user_id)
                        ->get();
                }
                else if($current_user_role == 'Realtor'){
                    $brokeragehouseID = Realtor::select('brokeragehouse_id')
                        ->where('realtor_id', $user_id)
                        ->get();

                    $propertiesID = Realtor::select('properties.id')
                        ->join('properties', 'properties.user_id','=','realtor_id')
                        ->where('realtors.brokeragehouse_id', $brokeragehouseID->brokeragehouse_id)
                        ->get();

                    return response()->json(['data' => $brokeragehouseID]);
                }
                else{
                    $Userplanfeatures = DB::table('user_plan_features')
                        ->select('*')
                        ->where('user_id','=',$user_id)
                        ->where('feature_id','=','3')
                        ->groupBy(['feature_id','plan_id'])
                        ->orderBy('id','desc')
                        ->first();

                    if(empty($Userplanfeatures)){
                        $html = "
                        <div class='col-md-12'>
                            <div class='col-md-12'>You don't have permission to access this, Please contact administration!</div>
                        </div>";
                    }
                    else{
                        $value = $Userplanfeatures->value;
                        $user_plan_feature_id = $Userplanfeatures->id;

                        if($value > 0){
                            $OwnerDetails = DB::table('owner_details')
                                ->select('id')
                                ->where('user_id','=',$user_id)
                                ->where('user_plan_feature_id','=',$user_plan_feature_id)
                                ->get();

                            $user['count'] = count($OwnerDetails);

                            $remainingView = $value - $user['count'] - 1;
                        }
                        else{
                            $remainingView = "Unlimited"; 
                        }

                        if($remainingView == "Unlimited" || $remainingView > 0){

                            $OwnerDetailsNew = DB::table('owner_details')
                                ->select('id')
                                ->where('user_id','=',$user_id)
                                ->where('peroperty_id','=',$property_id)
                                ->first();

                            $html = "";

                            if(empty($OwnerDetailsNew)){
                                DB::table('owner_details')->insert(
                                    ['peroperty_id' => $property_id, 'user_id' => $user_id, 'user_plan_feature_id' => $user_plan_feature_id]
                                );
                                $html = "<div style='color:green;text-align: center;padding: 10px;font-weight: bold;background: rgba(0,255,0,0.2);border-radius: 10px;margin-bottom: 10px;'>This details are saved in your dashboard.</div>";
                            }

                            $html .= "
                            <div class='col-md-12'>
                                <div class='col-md-12'>Name</div>
                                <div class='col-md-12'>".$user['first_name']." ".$user['last_name']."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Email</div>
                                <div class='col-md-12'>".$user['email']."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Phone</div>
                                <div class='col-md-12'>".$user['phone']."</div>
                            </div>
                            <hr>
                            <div class='col-md-12'>
                                <div class='col-md-12'>Your Remaining Views</div>
                                <div class='col-md-12'>".$remainingView."</div>
                            </div>";
                        }
                        else{
                            $html = "
                            <div class='col-md-12'>
                                <div class='col-md-12'>You have no views remaining, Please contact administration!</div>
                            </div>";
                        }
                    }
                }
            }
            else{
                $OwnerDetailsNew = DB::table('owner_details')
                    ->select('id')
                    ->where('user_id','=',$user_id)
                    ->where('peroperty_id','=',$property_id)
                    ->first();

                $html = "";

                $html .= "
                <div class='col-md-12'>
                    <div class='col-md-12'><i class='fa fa-user'></i> Name</div>
                    <div class='col-md-12'>".$user['first_name']." ".$user['last_name']."</div>
                </div>
                <hr>
                <div class='col-md-12'>
                    <div class='col-md-12'><i class='fa fa-envelope'></i> Email</div>
                    <div class='col-md-12'>".$user['email']."</div>
                </div>
                <hr>
                <div class='col-md-12'>
                    <div class='col-md-12'><i class='fa fa-phone'></i> Phone</div>
                    <div class='col-md-12'>".$user['phone']."</div>
                </div>";

                if(!empty($remainingView)){
                    $html .= "<hr><div class='col-md-12'>
                        <div class='col-md-12'>Your Remaining Views</div>
                        <div class='col-md-12'>".$remainingView."</div>
                    </div>";
                }

            }
            
            return response()->json(['data' => $html]);
        }
        else{
            return response()->json(['data' => 'You are not logged in, Please <a href="'.route('login').'">Login</a> and try again!']);
        }
    }

    public function property_single_page(Request $request)
    {
        $id = $request->id;
        $property = Property::where('id', $id)->first();

        return view('front_end.pages.property_single_page', compact('id', 'property'));
    }

    public static function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }

    public function subscribeToMailchimp(Request $request)
    {
        $postData = $request->all();

        $rules = [
            'email' => 'required|email'
        ];

        $validator = app( 'validator' )->make( $postData, $rules );
        if ( $validator->fails() )
        {
            return response()->json([$validator->errors()], 422);             
        }

        $mailchimp_apikey = "56b95ca3c25927007a99910480f89836-us3";
        $mailchimp_list_id = "c5ee0b01fd";


        $apiKey = $mailchimp_apikey; //env('MAILCHIMP_APIKEY');

        $postData = [
            "email_address" => $request->email, 
            "status" => "subscribed", 
        ];

        $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);

        // Setup cURL
        $ch = curl_init('https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $mailchimp_list_id . '/members/');

        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => array(
                'Authorization: apikey '. $apiKey,
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        //print_r($response);

        $response = json_decode($response);
        $message = $request->email . ' is subscribed successfully.';
        $flag = 1;
        if(isset($response->status) && $response->status == 400 && isset($response->title) && $response->title == 'Member Exists')
        {
            $message = $request->email . ' is already subscribed.';
            return response()->json([
                'flag' => 0,
                'message' => $message
            ]);
        }

        if(isset($response->status) && $response->status == 400 && isset($response->title) && $response->title == 'Invalid Resource' )
        {
            $message = $response->detail;
            return response()->json([
                'flag' => 0,
                'message' => $message
            ]);
        }

        if($flag == 1) {
            NewsletterSubscriber::create([
                'email_address' => $request->email,
            ]);
        }

        $data = [
            'flag' => $flag,
            'message' => $message,
        ];
        return response()->json($data);
    }

    public function getEnvoyindex()
    {

        return view('front_end.pages.envoy');
    }
    public function getCoordinates(Request $request){

        
        $latlong=Zipcode::where('latitude','!=',null)->where('zipcode', $request->zipcode)->get(['longitude','latitude','metro','city','state','zipcode']);
        
    //    foreach ($latlong as $lat){
    //            $latlongs[]=[(float)$lat->longitude ,(float)$lat->latitude];

    //    }

        foreach ($latlong as $ltln){
                $finalCoordinates[]=[
                    "type"=>"Point",
                    "properties"=> [
                        '<h2>'.$ltln->metro.'</h2><p>'.$ltln->city.','.$ltln->state.'</p>'.'<p>'.$ltln->zipcode.'</p>',
                        $ltln->zipcode
                    ],
                    "geometry"=> [
                        "type"=> "Point",
                        "coordinates"=>[(float)$ltln->longitude ,(float)$ltln->latitude],
                    ]
                ];
        }

        $data=[
            'type'=>"FeatureCollection",
            "features"=>$finalCoordinates
        ];
        return response()->json($data);
    }

    public function getStateName() {
        $datas = Zipcode::all()->pluck('state');
        $state_data = [];
        foreach ($datas as $data) {
            if(!array_key_exists($data, $state_data)) {
                $state_data[$data] = $data;
            }
        }
        return response()->json(array('success'=> true, 'data' => $state_data));
    }

    public function getCityName(Request $request) {
        $datas = Zipcode::where('state', $request->state)->pluck('city');
        $city_data = [];
        foreach ($datas as $data) {
            if(!array_key_exists($data, $city_data)) {
                $city_data[$data] = $data;
            }
        }
        return response()->json(array('success'=> true, 'data' => $city_data));
    }
}

