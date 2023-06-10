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
        for ($i = 0; $i < 2000; $i++) {
            $student = new Student([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->email(),
                'student_id' => fake()->unique()->numerify('20##-#####'),
                'research_id' => fake()->numberBetween(1,250,4),
                'program_id' => fake()->numberBetween(1,3),
                'usertype_id' => 5,
                ]);

                $student->save();
        }

        /* Student CEA [BSCE] Dummy Data */
        for ($i = 0; $i < 1000; $i++) {
            $student = new Student([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->email(),
                'student_id' => fake()->unique()->numerify('20##-#####'),
                'research_id' => fake()->numberBetween(251,500,4),
                'program_id' => fake()->numberBetween(4,6),
                'usertype_id' => 5,
                ]);

                $student->save();
        }
    }
}
