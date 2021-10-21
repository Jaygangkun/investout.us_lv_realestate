<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
        if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
            return redirect()->route('home')->with('success', 'You have already subscribed the plan');
        }

        $plan = Plan::findOrFail($request->get('plan'));
        
        
        
        return redirect()->route('homeplan')->with('success', 'Your plan subscribed successfully');
    }
}
