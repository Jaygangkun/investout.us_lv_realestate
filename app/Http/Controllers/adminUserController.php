<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Property;
use App\Profile;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Mail\envoysRegisterNotify;

class adminUserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user_manage.show-users', compact('users', 'role'));
    }

    public function getAdministrator()
    {
        $users = User::where([
        ['status', '=', '1'],
        ['assign_zip_code', '=', '']
    ])->whereHas(
                'roles',
        function ($q) {
            $q->where('roles.id', 4);
        }
              )->get();
        return view('admin.admin_manage.show-admin', compact('users'));
    }

    public function getEnvoys()
    {
        $users = User::where([
        ['status', '=', '1'],
        ['assign_zip_code', '!=', '']
    ])->whereHas(
                'roles',
        function ($q) {
            $q->where('roles.id', 4);
        }
              )->get();

        return view('admin.envoy.show-envoys', compact('users'));
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

    public function createEnvoy(Request $request)
    {
        $user = User::create([
          'first_name' => $request->input('first_name'),
          'last_name' => $request->input('last_name'),
          'email' => $request->input('email'),
          'assign_zip_code' => $request->input('assign_zip_code'),
          'password' => bcrypt($request->input('password')),
          'token' => '',
          'verified'=>1,
          'membership_type'=>1
        ]);
        $role = Role::where('id', 4)->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        Profile::Create(['user_id'=>$user->id]);

        Mail::to($user->email)->send(new envoysRegisterNotify($user, $user->first_name.' '.$user->last_name, $request->input('assign_zip_code')));

        return redirect()->back();
    }

    /**
     * Edit other admin profile by the user id
     */
    public function editAdmin(Request $request)
    {
      $user_id = $request->id;

      $user_info = User::findOrFail($user_id);
      $profile_data = Profile::where('user_id', $user_id)->first();
      //dd($profile_data->location);

      return view('admin.admin_manage.edit-admin', compact('user_info', 'profile_data'));
    }

    public function editEnvoy(Request $request)
    {
      $user_id = $request->id;

      $user_info = User::findOrFail($user_id);
      $profile_data = Profile::where('user_id', $user_id)->first();
      //dd($profile_data->location);

      return view('admin.envoy.edit-envoy', compact('user_info'));
    }

    /**
     * Update other admin profile by the user id
     */
    public function updateAdmin(Request $request)
    {

      $user_id = $request->hi_user_id;

        $profileData = $request->all(['location','phone','city','state','zipCode','company','aboutme','experience','socialmedia','inputvideo']);
        $userData = $request->all(['first_name','last_name','email']);

        if (User::where('id', $user_id)->first()->email != $userData['email']) {
            $request->validate([
            'email'=>'unique:users']);
        }

        //dd($request->hasFile('profile_image'));

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profilepic/');
            // $destinationPath = '/home/tyronejglover/public_html/profilepic/';
            $image->move($destinationPath, $image_name);
            $profileData['image'] = $image_name;
        }

        $user_info =  User::where('id', $user_id)->update([
        'first_name' => $userData['first_name'],
        'last_name' => $userData['last_name'],
        'email' => $userData['email'],
        ]);

        Profile::where('user_id', $user_id)->update($profileData);

        return redirect()->back()->with('success', 'Profile has been updated successfully.');

        return redirect(route('edit_other_admin_profile', [$user_id]));
    }

    public function updateEnvoy(Request $request)
    {

        $user_id = $request->hi_user_id;
        $userData = $request->all(['first_name','last_name','email','assign_zip_code']);
        if (User::where('id', $user_id)->first()->email != $userData['email']) {
            $request->validate([
            'email'=>'unique:users']);
        }

        //dd($request->hasFile('profile_image'));
        $user_info =  User::where('id', $user_id)->update([
        'first_name' => $userData['first_name'],
        'last_name' => $userData['last_name'],
        'email' => $userData['email'],
        'assign_zip_code' => $userData['assign_zip_code'],
        ]);

        return redirect('admin/users/envoys')->with('success', 'Profile has been updated successfully.');
    }

    public function destroy(Request $request)
    {
      dd($request);
      User::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }
}
