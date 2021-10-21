<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;
use App\Http\Requests\profileUpdate;
use Illuminate\Support\Facades\Session;

class brokeragehouseProfileController extends Controller
{
    protected $layout;
    protected $userTxt;

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function show()
    {
        $user = 'brokeragehouse';
        $member = auth()->user();
        $adminview = false;
        return view('brokeragehouse.profile.profile_view', compact('member', 'adminview'));
    }

    public function edit()
    {
        $user = 'brokeragehouse';
        return view('brokeragehouse.profile.profile_edit');
    }

    public function update(profileUpdate $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $profileData = $request->all(['location','phone','city','state','zipCode','company','aboutme','experience','socialmedia','inputvideo']);
        $userData = $request->all(['first_name','last_name','email']);

        if (User::where('id', $user->id)->first()->email != $userData['email']) {
            $request->validate([
            'email'=>'unique:users']);
        }

        if (Profile::where('id', $profile->id)->first()->image != $request->input('profile_img')) {
            // to handle upload and moving of profile picture

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/profilepic/');
                // $destinationPath = '/home/tyronejglover/public_html/profilepic/';
                $image->move($destinationPath, $image_name);
                $profileData['image'] = $image_name;
            } else {
                $profileData['image'] = 'default.png';
            }
        } else {
            $profileData['image'] = $request->input('profile_img');
        }

        $use =  User::where('id', $user->id)->update([
        'first_name' => $userData['first_name'],
        'last_name' => $userData['last_name'],
        'email' => $userData['email'],
        ]);

        Profile::where('user_id', $user->id)->update($profileData);

        Session::put('profile', Profile::where('user_id', $user->id)->first());


        return redirect(route('brokeragehouse.showprofile', $user->roles()->first()->slug));
    }

    public function destroy($id)
    {

        User::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;
        return view('brokeragehouse.properties.property-show', compact('property', 'condition'));
    }

}
