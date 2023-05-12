<?php

namespace Database\Seeders;

use App\Models\Student;
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
        for ($i = 0; $i < 3000; $i++) {
            $student = new Student([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->email(),
                'student_id' => fake()->unique()->numerify('20##-#####'),
                'research_id' => fake()->numberBetween(1,2000,4),
                'program_id' => 3,
                'usertype_id' => 5,
                ]);

                $student->save();
        }

        /* Student CEA [BSCE] Dummy Data */
        for ($i = 0; $i < 5; $i++) {
            $student = new Student([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->email(),
                'student_id' => fake()->numerify('2018-#####'),
                'research_id' => fake()->numberBetween(1,15),
                'program_id' => 4,
                'usertype_id' => 5,
                ]);

                $student->save();
        }
    }
}
