<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
       User::create([
        'name'=>'Admin',
        'username'=>'admin',
        'email'=>'admin@gmail.com',
        'password'=>Hash::make('12345678'),
        'role'=>'admin',
        'status'=>'active',
    
    
    ]);
        // Usser
       User::create([
        'name'=>'User',
        'username'=>'user',
        'email'=>'user@gmail.com',
        //'phone '=>'+8801941118675',
        'password'=>Hash::make('12345678'),
        'role'=>'user',
        'status'=>'active',
    
    
    ]);
    }
}
