<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         *  Universities Table
         */
        DB::table('universities')->insert([
            'acroname' => 'CATSU',
            'name' => 'Catanduanes State University',
        ]);
    }
}
