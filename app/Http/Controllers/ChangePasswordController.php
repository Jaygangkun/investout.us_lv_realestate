<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
  
class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->roles()->first()->id == 6){
            return view('brokeragehouse.changePassword');
        }
        else{
            return view('commons.changePassword');
        }
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $data = DB::table('role_user')->where('user_id', auth()->user()->id)->first();
        
        if ($data->role_id == 6) {
            return redirect('/brokeragehouse/change-password')->with('success', "Password updated successfully!!");
        }
        else {
            return redirect('/change-password')->with('success', "Password updated successfully!!");
        }
    }
}
