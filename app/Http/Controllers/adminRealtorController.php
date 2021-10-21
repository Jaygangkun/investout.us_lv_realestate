<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Property;
use App\Profile;
use App\Realtor;
use jeremykenedy\LaravelRoles\Models\Role;

class adminRealtorController extends Controller
{
    public function index()
    {
        $realtors = User::select('users.*')
                ->join('role_user', 'role_user.user_id','=','users.id')
                ->whereNotIn('users.id', function($query){
                    $query->select('realtor_id')
                    ->from('realtors');
                })
                ->where('role_user.role_id',2)
                ->where('users.status',1)
                ->get();
        return view('admin.realtor_manage.show-realtors', compact('realtors'));
    }

    public function assignZipCode(Request $request)
    {
        $assignZipCode = $request->assignZipCode;
        $id = $request->id;
        $data = array("assign_zip_code"=>$assignZipCode);

        $duplicateRecords = User::where($data)->count();
       
        if($duplicateRecords == 0)
        {
            // Update User
            $affectedRows = User::where('id', '=', $id)->update($data);
            if($affectedRows > 0)
            {
                echo json_encode(array("status"=> true, "message"=> "Zip code assign successfully."));
            }
            else
            {
                echo json_encode(array("status"=> false, "message"=> "Somethinng went wrong! Please try again."));
            }
        }
        else
        {
            echo json_encode(array("status"=> false, "message"=> "This zip code is already assign. Please use different zip code."));
        }
    }

    
}
