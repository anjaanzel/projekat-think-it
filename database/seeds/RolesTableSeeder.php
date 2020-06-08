<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::query()->delete();
        DB::table('users')->delete();

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'captain']);
        Role::create(['name'=>'engineer']);
        Role::create(['name'=>'crew']);
    }
}
