<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Realtor;
use App\Profile;
use DB;
use Auth;
use App\UserPlanFeatures;

class EnterpriseController extends Controller
{
    public function index()
    {
        return view('enterprise.index');
    }

}
