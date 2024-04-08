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

        $students = [
            'Aussei A. Mendoza',
            'Melina Kaye G. Satairapan',
            'Jennifer D. Templonuevo',
            'Franz Joseph T. Dominquez',
            'Ralpf A. Dolores',
            'Reawin L. Aquino',
            'Elena V. Bon',
            'Jenny C. Go',
            'Joenavil T. Sierra',
            'Rizza Laura T. Tabelin',
            'Jannifer T. Temanil',
            'Alysaa Marie Abella',
            'Vanissa Tomagan',
            'Mayette Vergara',
            'Roniedel Barrio',
            'Catherine Talan',
            'Jonalyn Morales',
            'Angelica D. Aguilar',
            'April Joy S. Dela Cruz',
            'Liezel C. Panti',
            'Jennifer T. Solsona',
            'Zaira Z. Abraham',
            'Anal Yn C. Ausencia',
            'Angela Mae R. Guerrero',
            'Janly Ann T. Mendoza',
            'Mikee T. Vargas',
            'Marvin D. Rendon',
            'Ramon Franco C. Villacorta',
            'Rollie L. Tario',
            'Edward T. Reyes',
            'James Ivan T. Tapit',
            'Antonio Jose V. Torrente',
            'Jerome T. Alcantara',
            'John Kavin Guerrero',
            'Neil Patrick M. Del Valle',
            'Jaypee Gerard Samudio',
            'Teodorico Cruz',
            'Joseph T. Oliman',
            'Michael B. Inigo',
            'April Joy B. Tarnate',
            'Elirose M. Barcelon',
            'Maricon B. Habana',
            'Ma. Carmela M. Matienzo',
            'Janice L. Del Barrio',
            'Analyn E. Sarmiento',
            'Myla SJ. Tablizo',
            'Al Kevin',
            'Antonette Delluza',
            'Angelica T. Romero',
            'Fritz Angelo V. Magdaraog',
            'Paul B. Presentacion',
            'Patrick T. Talan'
        ];

        foreach ($students as $studentName) {
            $names = explode(' ', $studentName);
            $firstName = $names[0];
            $middleName = count($names) > 2 ? $names[1] : null;
            $lastName = count($names) > 2 ? $names[2] : $names[1];

            $student = new Student([
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'email' => strtolower(str_replace(' ', '', $firstName) . '.' . strtolower($lastName) . '@example.com'),
                'student_id' => fake('en_US')->unique()->numerify('20##-#####'),
                'research_id' => fake('en_US')->numberBetween(1, 10),
                'email_verified_at' => now(),
                'confirmed_by_id' => 3,
                'program_id' => 1,
                'usertype_id' => 5,
            ]);

            $student->save();
        }


        /* Student CICT [BSIT] Dummy Data */
       /*  for ($i = 0; $i < 60; $i++) {
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
        } */

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
