<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'pseudo'=>'Lebosse974',
            'name'=>'sku sku',
            'email'=>'m@gmail.com',
            'password'=>Hash::make('azerty'),
            
        ]);
    }
}
