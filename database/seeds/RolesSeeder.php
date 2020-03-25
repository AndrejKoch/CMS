<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {



        $faker = Faker\Factory::create();

        DB::table('users_roles')->insert([
            'name' => 'Admin',

        ]);
        DB::table('users_roles')->insert([
            'name' => 'Editor',

        ]);
        DB::table('users_roles')->insert([
            'name' => 'Guest',

        ]);
    }


}
