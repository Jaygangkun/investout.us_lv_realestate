<?php

use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Add Roles
         *
         */

        if (Role::where('name', '=', 'User')->first() === null) {
            $userRole = Role::create([
               'name' => 'Seller',
               'slug' => 'seller',
               'description' => 'Seller Role',
               'level' => 2,
           ]);
        }

        if (Role::where('name', '=', 'User')->first() === null) {
            $userRole = Role::create([
               'name' => 'Realtor',
               'slug' => 'realtor',
               'description' => 'Realtor Role',
               'level' => 3,
           ]);
        }

        if (Role::where('name', '=', 'User')->first() === null) {
            $userRole = Role::create([
                 'name' => 'Investor',
                 'slug' => 'investor',
                 'description' => 'Investor Role',
                 'level' => 4,
             ]);
        }

        if (Role::where('name', '=', 'Admin')->first() === null) {
            $adminRole = Role::create([
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Admin Role',
                'level' => 5,
            ]);
        }
    }
}
