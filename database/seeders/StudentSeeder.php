<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /* Student CICT [BSIT] Dummy Data */
        for ($i = 0; $i < 5; $i++) {
            DB::table('students')->insert([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                'student_id' => fake()->numerify('2018-#####'),
                'program_id' => 3,
                'usertype_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        /* Student CEA [BSCE] Dummy Data */
        for ($i = 0; $i < 5; $i++) {
            DB::table('students')->insert([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                'student_id' => fake()->numerify('2018-#####'),
                'program_id' => 4,
                'usertype_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
