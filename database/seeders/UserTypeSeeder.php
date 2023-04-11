<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         *  User_types  Table
         */
        DB::table('user_types')->insert([
            'id' => 1,
            'name' => 'admin',
        ]);
        DB::table('user_types')->insert([
            'id' => 2,
            'name' => 'dean',
        ]);
        DB::table('user_types')->insert([
            'id' => 3,
            'name' => 'clerk',
        ]);
        DB::table('user_types')->insert([
            'id' => 4,
            'name' => 'faculty',
        ]);
        DB::table('user_types')->insert([
            'id' => 5,
            'name' => 'student',
        ]);

    }
}
