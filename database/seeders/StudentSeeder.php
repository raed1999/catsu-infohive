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
        for ($i = 0; $i < 60; $i++) {
            $student = new Student([
                'first_name' => fake('en_US')->firstName(),
                'middle_name' => fake('en_US')->lastName(),
                'last_name' => fake('en_US')->lastName(),
                'email' => fake('en_US')->unique()->email(),
                'student_id' => fake('en_US')->unique()->numerify('20##-#####'),
                'research_id' => fake('en_US')->numberBetween(1,15,4),
                'program_id' => fake('en_US')->numberBetween(1,3),
                'usertype_id' => 5,
                ]);

                $student->save();
        }

        /* Student CEA [BSCE] Dummy Data */
      /*   for ($i = 0; $i < 1000; $i++) {
            $student = new Student([
                'first_name' => fake('en_US')->firstName(),
                'middle_name' => fake('en_US')->lastName(),
                'last_name' => fake('en_US')->lastName(),
                'email' => fake('en_US')->unique()->email(),
                'student_id' => fake('en_US')->unique()->numerify('20##-#####'),
                'research_id' => fake('en_US')->numberBetween(251,500,4),
                'program_id' => fake('en_US')->numberBetween(4,6),
                'usertype_id' => 5,
                ]);

                $student->save();
        } */
    }
}
