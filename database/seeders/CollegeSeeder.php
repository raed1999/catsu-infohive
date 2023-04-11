<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         *  Colleges  Table
         */
        DB::table('colleges')->insert([
            'id' => 1,
            'acroname' => 'ITS',
            'name' => 'Information Technology Services',
            'university_id' => 1,
        ]);
        DB::table('colleges')->insert([
            'id' => 2,
            'acroname' => 'CEA',
            'name' => 'College of Engineering and Architecture',
            'university_id' => 1,
        ]);
        DB::table('colleges')->insert([
            'id' => 3,
            'acroname' => 'CIT',
            'name' => 'College of Industrial Technology',
            'university_id' => 1,
        ]);
        DB::table('colleges')->insert([
            'id' => 4,
            'acroname' => 'CICT',
            'name' => 'College of Information and Communications Technology',
            'university_id' => 1,
        ]);
    }
}
