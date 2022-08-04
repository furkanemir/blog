<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        Roles::create([
            'name'=>'Admin',
        ]);
        User::create([
            'role_id'=>1,
            'name'=>'Deneme Admin',
            'email'=>'deneme@gmail.com',
            'password'=>Hash::make('123456'),
        ]);
    }
}
