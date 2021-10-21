<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Property;
use App\Profile;
use App\StripePlan;
use App\UserPlan;
use App\Features;
use App\RoleFeatures;
use App\PlanFeatures;
use DB;
use jeremykenedy\LaravelRoles\Models\Role;

class adminStripeController extends Controller
{
    public function index()
    {
        $plans = StripePlan::all();
        $countPlan = count($plans);
        if($countPlan == 0){
            $url = env('STRIPE_BASE').'v1/plans';
            $authorization = "Authorization: Bearer ".env('STRIPE_SECRET');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( $authorization ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            if (curl_errno($ch)) {
                $error_msg = curl_error($ch);
            }
            curl_close($ch);
                                
            if (isset($error_msg)) {
                //print_r($error_msg);
            }

            $output = (array) json_decode($server_output);
            if(count($output['data']) > 0){
                $plans = $output['data'];
                foreach($plans as $plan){
                    $stripeplan = new StripePlan();
                    $stripeplan->plan_id = $plan->id;
                    $stripeplan->plan_name = $plan->name;
                    $stripeplan->amount = $plan->amount/100;
                    $stripeplan->interval = $plan->interval;
                    $stripeplan->role = null;
                    $stripeplan->other_meta = json_encode($plan);
                    $stripeplan->save();
                }
            }
        }
        $plans = StripePlan::all();
        $roles = Role::where('id', '!=', 4)->get();
        return view('admin.stripe.index', compact('plans','roles'));
    }

    public function updateStripePlan($id,Request $request){
        $plan = StripePlan::find($id);
        $plan->role = $request->input('plan_role');
        $plan->save();
        return redirect('/admin/stripe');
    }

    public function getAdministrator()
    {
        $users = User::whereHas(
                'roles',
        function ($q) {
            $q->where('roles.id', 4);
        }
              )->get();
        return view('admin.admin_manage.show-admin', compact('users'));
    }

    public function createAdmin(Request $request)
    {
        $user = User::create([
          'first_name' => $request->input('first_name'),
          'last_name' => $request->input('last_name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
          'token' => '',
          'verified'=>1,
          'membership_type'=>1
      ]);

        $role = Role::where('id', 4)->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        Profile::Create(['user_id'=>$user->id]);

        return redirect()->back();
    }

    public function getUserPlans(){
        $plans = array();
        $stripe_plans = StripePlan::where('is_visible',1)->where('role','=',NULL)->get();
        $user_plans = UserPlan::all();

        //dd($stripe_plans);
        //dd($stripe_plans);

        $temp = array();
        foreach($user_plans as $user_plan){
            $temp[] = $user_plan->plan_id;
        }
        $user_plans = $temp;
        $temp = array();
        foreach($stripe_plans as $stripe_plan){
            if(!in_array($stripe_plan->id, $user_plans)){
                $temp[] = $stripe_plan;
            }
        }

        //$stripe_plans = $temp;
        $user_plans = DB::table('stripe_plans')
                    ->join('user_plans', 'stripe_plans.id', '=', 'user_plans.plan_id')
                    ->join('roles', 'user_plans.role_id', '=', 'roles.id')
                    ->select('roles.name', 'stripe_plans.plan_id as stripe_plan_id', 'stripe_plans.plan_name', 'stripe_plans.amount', 'stripe_plans.interval', 'user_plans.*')
                    ->get();
        

        $roles = Role::where('id', '!=', 4)->where('id', '!=', 7)->where('id', '!=', 8)->get();
        return view('admin.plans.index', compact('user_plans','roles','stripe_plans'));        
    }

    public function addUserPlans(Request $request){
        $stripe_plan_id = $request->input('stripe_plan');
        
        if(isset($request['value']) && is_array($request['value']))
        {
            foreach($request['value'] as $key => $value){
                $planfeature = new PlanFeatures();
                $planfeature->plan_id = $stripe_plan_id;
                $planfeature->feature_id = $key;
                $planfeature->value = $value[0];
                $planfeature->save();
            }
        }

        $plan = new UserPlan();
        $plan->plan_id = $request->input('stripe_plan');
        $plan->role_id = $request->input('plan_role');
        $plan->limitations = $request->input('limitation');
        $plan->status = 1;
        $plan->save();

        $user_plan = StripePlan::find($stripe_plan_id);
        $user_plan->plan_name = $request->input('stripe_plan_name');
        $user_plan->role = $request->input('plan_role');
        $user_plan->save();    

        return redirect('/admin/stripe/manage-plans')->with('success', "Plan added successfully.");
    }

    public function syncStripePlans(){
        $stripe_plans = StripePlan::all();
        $temp = array();
        foreach($stripe_plans as $stripe_plan){
            $temp[$stripe_plan->plan_id] = $stripe_plan->id;
        }

        $stripe_plans = $temp;

        $url = env('STRIPE_BASE').'v1/plans';
        $authorization = "Authorization: Bearer ".env('STRIPE_SECRET');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
                                
        $output = (array) json_decode($server_output);
        //dd($output);
        if(isset($output['data']) && count($output['data']) > 0){
            $plans = $output['data'];
            foreach($plans as $plan){
                if(array_key_exists($plan->id,$stripe_plans)){
                    $plan_id = $stripe_plans[$plan->id];
                    $stripeplan = StripePlan::find($plan_id);
                    $stripeplan->plan_id = $plan->id;
                    $stripeplan->plan_name = $plan->id; //"Investor";
                    $stripeplan->amount = $plan->amount/100;
                    $stripeplan->interval = $plan->interval;
                    $stripeplan->product_id = $plan->product;
                    $stripeplan->other_meta = json_encode($plan);
                    $stripeplan->save();
                }else{
                    $prods = StripePlan::where('product_id',$plan->product)->get();
                    if(!empty($prods)){
                        foreach($prods as $prod){
                            $pro = StripePlan::where('id',$prod->id)->first();
                            $pro->is_visible = 0;
                            $pro->save();
                        }
                        
                    }

                    $stripeplan = new StripePlan();
                    $stripeplan->plan_id = $plan->id;
                    //$stripeplan->plan_name = $plan->nickname;
                    $stripeplan->plan_name = $plan->id; //"Home Seller";
                    $stripeplan->amount = $plan->amount/100;
                    $stripeplan->interval = $plan->interval;
                    $stripeplan->role = null;
                    $stripeplan->is_visible = 1;
                    $stripeplan->product_id = $plan->product;
                    $stripeplan->other_meta = json_encode($plan);
                    $stripeplan->save();
                }
            }
        }
        return redirect('/admin/stripe/manage-plans')->with('syncSuccess', "Stripe plan sync was successfull.");
    }

    public function updateUserPlanStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        $user_plan = UserPlan::find($id);
        $user_plan->status = $status;
        $user_plan->save();
        echo "1";
        exit;
    }

    public function getUserPlan(Request $request){
        $id = $request->input('id');
        $stripe_plans = StripePlan::all();
        $user_plans = UserPlan::all();
        $temp = array();
        foreach($user_plans as $user_plan){
            if($user_plan->plan_id != $id){
                $temp[] = $user_plan->plan_id;
            }
        }
        $user_plans = $temp;
        $temp = array();
        foreach($stripe_plans as $stripe_plan){
            if(!in_array($stripe_plan->id, $user_plans)){
                $temp[] = $stripe_plan;
            }
        }
        $stripe_plans = $temp;
        echo json_encode($stripe_plans);
        exit;
    }

    public function updateUserPlan(Request $request){
        //dd($request->input('plan_role'));
        $plan_id = $request['stripe_plan'];
        if(isset($request['value']) && is_array($request['value'])) {
            $exist = DB::table('plan_features')->where('plan_id','=',$plan_id)->get();
            if(count($exist) == 0){
                foreach($request['value'] as $key => $value){
                    $planfeature = new PlanFeatures();
                    $planfeature->plan_id = $plan_id;
                    $planfeature->feature_id = $key;
                    $planfeature->value = $value[0];
                    $planfeature->save();
                }
            }
            else{
                foreach($request['value'] as $key => $value){
                    $feature_id = $key;
                    $planfeature = PlanFeatures::where(['plan_id'=>$plan_id,'feature_id'=>$feature_id])->update(['value'=>$value[0]]);
                }
            }
        }
        $id = $request->input('id');
        $plan_role = $request->input('plan_role');
        $user_plan = UserPlan::find($id);
        $user_plan->role_id = $plan_role;
        $user_plan->save();

        $user_plan = StripePlan::find($plan_id);
        $user_plan->plan_name = $request->input('stripe_plan_name');
        $user_plan->save();  

        return redirect('/admin/stripe/manage-plans')->with('success', "Plan updated successfully");
    }

    public function getRoleFeatures(Request $request){
        $id = $request->input('id');
        $plan_id = $request->input('planid');
        $role_features = array();
        $role_features_simple = $users = DB::table('role_features')
                    ->join('features', 'features.id', '=', 'role_features.feature_id')
                    ->select('features.name', 'features.id as feature_id', 'role_features.role_id')
                    ->where('role_features.role_id','=',$id)
                    ->where('features.status','=','1')
                    ->get();

        foreach ($role_features_simple as $role_feature) {
            $value = DB::table('plan_features')
                    ->select('plan_features.value')
                    ->where('plan_features.plan_id','=',$plan_id)
                    ->where('plan_features.feature_id','=',$role_feature->feature_id)
                    ->get();
            $arr = array();
            $arr['name'] = $role_feature->name;
            $arr['feature_id'] = $role_feature->feature_id;
            $arr['role_id'] = $role_feature->role_id;
            if(count($value) == 1){
                $arr['value'] = $value[0]->value;
            }
            else{
                $arr['value'] = '0';
            }
            array_push($role_features, $arr);
        }
        echo json_encode($role_features);
        exit;   
        
    }

    public function getUserPlanDetails(Request $request){
        $userid = $request->input('userid');
        $user_role_features = array();
        $user_role = $users = DB::table('role_user')
                    ->join('roles', 'roles.id', '=', 'role_user.role_id')
                    ->select('roles.id','roles.name')
                    ->where('user_id','=',$userid)
                    ->get();
                    
        $user_role_features['role_name'] = $user_role[0]->name;
        $user_role_features['details'] = array();
        $user_role_features['details'] = DB::table('user_plan_features')
                    ->join('stripe_plans', 'stripe_plans.id', '=', 'user_plan_features.plan_id')
                    ->join('features', 'features.id', '=', 'user_plan_features.feature_id')
                    ->select('stripe_plans.plan_name', 'features.id as feature_id', 'features.name as feature_name', 'user_plan_features.value')
                    ->where('user_plan_features.user_id','=',$userid)
                    ->get();

        echo json_encode($user_role_features);
    }

}
