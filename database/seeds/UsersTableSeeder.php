<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Ship;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //User::truncate();

     /**
     $adminRole = Role::where('name', 'admin')->first();    
     $captainRole = Role::where('name', 'captain')->first();    
     $engineerRole = Role::where('name', 'engineer')->first();    
     $crewRole = Role::where('name', 'crew')->first();  
     */ 

     $admin = User::create([
     	'name'=>'Admin',
     	'surname'=>'User',
     	'email'=>'admin@admin.com',
     	'password'=>Hash::make('adminadmin'),
     	'role_id'=>'1',
          'ship_id'=>'1'
     ]);

     // $captain = User::create([
     // 	'name'=>'Petar',
     // 	'surname'=>'Petrovic',
     // 	'email'=>'petar@petrovic.com',
     // 	'password'=>Hash::make('password'),
     // 	'role_id'=>'27',
     //      'ship_id'=>'2'
     // ]);


     // $engineer = User::create([
     // 	'name'=>'Marko',
     // 	'surname'=>'Markovic',
     // 	'email'=>'marko@markovic.com',
     // 	'password'=>Hash::make('password'),
     // 	'role_id'=>'28',
     //      'ship_id'=>'2'
     // ]);

     // $crew = User::create([
     // 	'name'=>'Nadica',
     // 	'surname'=>'Vidic',
     // 	'email'=>'nadica@vidic.com',
     // 	'password'=>Hash::make('password'),
     // 	'role_id'=>'28',
     //      'ship_id'=>'2'
     // ]);


    }
}
