<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UniversitySeeder::class);

        $this->call(UserTypeSeeder::class);

        $this->call(CollegeSeeder::class);

        $this->call(FacultySeeder::class);

        $this->call(ProgramSeeder::class);

    }
}
