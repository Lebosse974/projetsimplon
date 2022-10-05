<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(
            ['nom' => 'Admin'],
            ['nom'=>'Admin']);

        Role::firstOrCreate(
            ['nom' => 'User'],
        [
            'nom'=>'User'
        ]);

        RoleUser::firstOrCreate( ['role_id' => 1],[
            'role_id'=> 1,
            'user_id'=> User::where('email', 'm@gmail.com')->first()->id
        ]);
    }
}
