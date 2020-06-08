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


     $admin = User::create([
     	'name'=>'Admin',
     	'surname'=>'User',
     	'email'=>'admin@admin.com',
     	'password'=>Hash::make('adminadmin'),
     	'role_id'=>'1',
          'ship_id'=>'1'
     ]);

        
     $captain = User::create([
          'name'=>'Petar',
          'surname'=>'Petrovic',
          'email'=>'petar@petrovic.com',
          'password'=>Hash::make('password'),
          'role_id'=>'2',
          'ship_id'=>'1'
     ]);


     $engineer = User::create([
          'name'=>'Marko',
          'surname'=>'Markovic',
          'email'=>'marko@markovic.com',
          'password'=>Hash::make('password'),
          'role_id'=>'3',
          'ship_id'=>'1'
     ]);

     $crew = User::create([
          'name'=>'Nadica',
          'surname'=>'Vidic',
          'email'=>'nadica@vidic.com',
          'password'=>Hash::make('password'),
          'role_id'=>'4',
          'ship_id'=>'1'
     ]);


    }
}
