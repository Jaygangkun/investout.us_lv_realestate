<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;
use App\WorkCategories;
use App\UsersBodyOfWork;
use App\UserSpecialities;
use App\Setting;
use DB;
use App\Http\Requests\profileUpdate;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
    protected $layout;
    protected $userTxt;

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function show($user, $adminView = null)
    {
        if ($adminView) {
            $member = User::where('id',$adminView)->first();
            $adminview = true;
            if($member->hasRole('investor'))
            {
                $users_specialities = DB::table('users_specialities')
                    ->where('user_id','=',$member->id)
                    ->get();

                $profileDetails = DB::table('users_body_of_work')
                    ->join('work_categories','work_categories.id','=','users_body_of_work.work_category_id')
                    ->where('users_body_of_work.user_id','=',$member->id)
                    ->get();
                return view('commons.profile.profile_view', compact('member', 'adminview', 'profileDetails', 'users_specialities'));
            }
            if($member->hasRole('wholeseller'))
            {
                return view('whole_seller.profile.profile_view', compact('member', 'adminview'));
            }
            return view('commons.profile.profile_view', compact('member', 'adminview'));
        } else {
            $member = auth()->user();
            $adminview = false;
            if($member->hasRole('investor'))
            {
                $users_specialities = DB::table('users_specialities')
                    ->where('user_id','=',$member->id)
                    ->get();

                $profileDetails = DB::table('users_body_of_work')
                    ->join('work_categories','work_categories.id','=','users_body_of_work.work_category_id')
                    ->where('users_body_of_work.user_id','=',$member->id)
                    ->get();
                return view('commons.profile.profile_view', compact('member', 'adminview', 'profileDetails', 'users_specialities'));
            }
            if($member->hasRole('wholeseller'))
            {
                return view('whole_seller.profile.profile_view', compact('member', 'adminview'));
            }
            return view('commons.profile.profile_view', compact('member', 'adminview'));
        }
    }

    public function edit($user)
    {
        $member = auth()->user();
        $work_categories_list = WorkCategories::select("*")
                                ->get();
        $user_body_of_work = UsersBodyOfWork::select("*")
                                ->where("user_id", auth()->user()->id)
                                ->groupby("work_category_id")
                                ->get();
        $user_body_of_work_images = UsersBodyOfWork::select("*")
                                ->where("user_id", auth()->user()->id)
                                ->get();
        $user_specialities = UserSpecialities::select("*")
                                ->where("user_id", auth()->user()->id)
                                ->get();
               
        if($member->hasRole('wholeseller'))
        {
            return view('whole_seller.profile.profile_edit', compact('work_categories_list', 'user_body_of_work', 'user_body_of_work_images', 'user_specialities'));
        }
        return view('commons.profile.profile_edit', compact('work_categories_list', 'user_body_of_work', 'user_body_of_work_images', 'user_specialities'));
    }

    public function update(profileUpdate $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $profileData = $request->all(['location','phone','city','state','zipCode','company','aboutme','experience', 'languages', 'licence_number', 'my_story_heading', 'my_story','socialmedia','inputvideo']);
        $userData = $request->all(['first_name','last_name','email']);

        if (User::where('id', $user->id)->first()->email != $userData['email']) {
            $request->validate([
            'email'=>'unique:users']);
        }

        //if (Profile::where('id', $profile->id)->first()->image != $request->input('profile_img')) {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profilepic/');
            // $destinationPath = '/home/tyronejglover/public_html/profilepic/';
            $image->move($destinationPath, $image_name);
            $profileData['image'] = $image_name;
        }

        $use =  User::where('id', $user->id)->update([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
        ]);
        
        if($user->hasRole('investor'))
        {
            if ($request->hasFile('my_story_image')) {
                $exist_image = Profile::where('user_id', $user->id)->pluck("my_story_image");
                @unlink(public_path('upload/'.$exist_image[0]));
                $image = $request->file('my_story_image');
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/');
                $image->move($destinationPath, $image_name);
                $profileData['my_story_image'] = $image_name;
            }

            foreach($request->all() as $key => $value)
            {
                if(strpos($key,'work_category_image_') !== false) {
                    $work_category_id = explode("work_category_image_", $key)[1];
                    if($work_category_id <= 8)
                    {
                        foreach($value as $file_key=>$file_value)
                        {   
                            $image_name = time().'_'.$file_key.'.'.$file_value->getClientOriginalExtension();
                            // $destinationPath = public_path('/upload/');
                            $file_value->move(public_path('upload'), $image_name);
                            // $destinationPath = '/home/tyronejglover/public_html/profilepic/';
                            // $image->move($destinationPath, $image_name);
                            $usersBodyWorkData['user_id'] = $user->id;
                            $usersBodyWorkData['work_category_id'] = $work_category_id;
                            $usersBodyWorkData['image_url'] = $image_name;
                            UsersBodyOfWork::insert($usersBodyWorkData);
                        }
                    }      
                }
            }

            foreach($request->speciality_id as $key=>$specialityId)
            {
                $usersSpecialityData = [];
                if(is_null($specialityId))
                {
                    if(!is_null($request->speciality_title[$key]))
                    {
                        $usersSpecialityData['user_id'] = $user->id;
                        $usersSpecialityData['title'] = $request->speciality_title[$key];
                        if($request->hasFile('speciality_image_'.($key+1)))
                        {
                            $image = $request->file('speciality_image_'.($key+1));
                            $image_name = time().'_'.($key+1).'.'.$image->getClientOriginalExtension();
                            $image->move(public_path('upload'), $image_name);
                            $usersSpecialityData['image_url'] = $image_name;
                        }
                        UserSpecialities::insert($usersSpecialityData);
                    }
                }
                else
                {
                    $usersSpecialityData['title'] = $request->speciality_title[$key];
                    if($request->hasFile('speciality_image_'.($key+1)))
                    {
                        $exist_image = UserSpecialities::where('id', $specialityId)->pluck("image_url");
                        @unlink(public_path('upload/'.$exist_image[0]));
                        $image = $request->file('speciality_image_'.($key+1));
                        $image_name = time().'_'.($key+1).'.'.$image->getClientOriginalExtension();
                        $image->move(public_path('upload'), $image_name);
                        $usersSpecialityData['image_url'] = $image_name;    
                    }
                    UserSpecialities::where('id', $specialityId)->update($usersSpecialityData);
                }
            }
        }
            
        Profile::where('user_id', $user->id)->update($profileData);

        Session::put('profile', Profile::where('user_id', $user->id)->first());


        return redirect(route('profile.show', $user->roles()->first()->slug));
    }

    public function destroy($id)
    {
        User::where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function specialityDelete(Request $request)
    {
        $exist_image = UserSpecialities::where('id', $request->id)->pluck("image_url");
        @unlink(public_path('upload/'.$exist_image[0]));
        UserSpecialities::find($request->id)->delete();
        return response()->json(['status' => true, 'id' => $request->id, 'message'=> 'User\'s speciality deleted successfully.']);
    }

    public function WorkCategoryImageDelete(Request $request)
    {
        $exist_image = UsersBodyOfWork::where('id', $request->id)->pluck("image_url");
        @unlink(public_path('upload/'.$exist_image[0]));
        UsersBodyOfWork::find($request->id)->delete();
        return response()->json(['status' => true, 'id' => $request->id, 'message'=> 'User\'s body of work category image deleted successfully.']);
    }

    public function workCategoryDelete(Request $request)
    {
        $user = Auth::user();
        $exist_image = UsersBodyOfWork::select("image_url")
                                            ->where('work_category_id', $request->category_id)
                                            ->get();
        foreach($exist_image as $key=>$image)
        {
            @unlink(public_path('upload/'.$image->image_url));
        }
        UsersBodyOfWork::where([['user_id', '=', $user->id], ['work_category_id', '=', $request->category_id]])->delete();

        return response()->json(['status' => true, 'category_id' => $request->category_id, 'message'=> 'User\'s body of work category deleted successfully.']);
    }

    public function hideVideo(Request $request) {
        $user = Auth::user();

        $setting = Setting::where('user_id', $user->id)->get();
        if(count($setting) != 0) {
            Setting::where('user_id', $user->id)->update([
                'hidevideo' => '1'
            ]);
        }
        else {
            $setting = new Setting;
            $setting->user_id = $user->id;
            $setting->hidevideo = '1';
            $setting->save();
        }
        

        return response()->json(['status' => $user->id]);
    }
}
