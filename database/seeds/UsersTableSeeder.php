<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellerRole 			= Role::where('name', '=', 'Seller')->first();
        $investorRole 			= Role::where('name', '=', 'Investor')->first();
        $permissions 		= Permission::all();

        /**
         * Add Users
         *
         */
        if (User::where('email', '=', 'vjhameed6@gmail.com')->first() === null) {
            $newUser = User::create([
                'first_name' => 'lucifer',
                'last_name' => 'hk',
                'verified'=>1,
                'email' => 'vjhameed6@gmail.com',
                'password' => bcrypt('rockstar'),
            ]);

            $newUser->attachRole($investorRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (User::where('email', '=', 'vjhameed3@gmail.com')->first() === null) {
            $newUser = User::create([
                'first_name' => 'hameed',
                'verified'=>1,
                'last_name' => 'khan',
                'email' => 'vjhameed3@gmail.com',
                'password' => bcrypt('rockstar'),
            ]);

            $newUser->attachRole($sellerRole);
        }
    }
}
