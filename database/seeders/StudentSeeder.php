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
        $studentsWithResearchIDs = [
            'Janice L. Del Barrio' => 1,
            'Analyn E. Relato' => 1,
            'Myla SJ. Sarmiento' => 1,
            'Al Kevin Tablizo' => 1,
            'Antonette Delluza' => 2,
            'Angelica T. Romero' => 2,
            'Fritz Angelo V. Magdaraog' => 3,
            'Paul B. Presentacion' => 3,
            'Patrick T. Talan' => 3,
            'Monique Angela Beo' => 4,
            'John Alber Diwata' => 4,
            'Renalyn Pagal' => 4,
            'Christian Bert Tria' => 4,
            'Adrian Arcilla' => 5,
            'Jerico S. Balcueva' => 5,
            'Ruben Sontillano Jr.' => 5,
            'Marisol Teves' => 5,
            'Shemaine T. De Roma' => 6,
            'Marivic F. Tabilog' => 6,
            'Sugaray M. Torres' => 6,
            'Loida A. Zuniega' => 6,
            'Rey Anne A. Delos Reyes' => 7,
            'Noeh D. La Torre' => 7,
            'Kathleen S. Tubice' => 7,
            'Norilyn T. Tumanlao' => 7,
            'Kirl Patrick Aguilar' => 8,
            'John Harris De Mesa' => 8,
            'Judith Teleg' => 8,
            'Manilyn Torrestre' => 8,
            'Jayson M. Bonao' => 9,
            'Shonalyn T. Pamplona' => 9,
            'Mara J. Sumido' => 9,
            'Riza V. Tejerero' => 9,
            'John Ernest S. Estrada' => 10,
            'Venus S. Manlangit' => 10,
            'Chistyl S. Tabuzo' => 10,
            'Razle T. Timbal' => 10,
            'Maria Shiela D. Eusebio' => 11,
            'Joemenic T. Isidoro' => 11,
            'Maribeth T. Robles' => 11,
            'Roseann T. Tabinas' => 11,
            'Joshua V. Santelices' => 12,
            'Ryan Christian T. Padilla' => 13,
            'Jhon B. Publico' => 13,
            'Paula Lei T. Tating' => 13,
            'Erika Jean M. Torres' => 13,
            'Ma. Alinica F. Arcilla' => 14,
            'Iggy Francis P. Mendoza' => 14,
            'Francis Adrian T. Santos' => 14,
            'Maria Jeanette D. Teope' => 14,
            'Arvin O. Benavidez' => 15,
            'Rodjay B. Martinez' => 15,
            'Noli M. Omadto' => 15,
            'Ara Faye T. Robles' => 15,
            'Reycia Ann Aguilar' => 16,
            'Realyn De Quiroz' => 16,
            'Sonia Romero' => 16,
            'Arvin Tablate' => 16,
            'Bianca C. Antonio' => 17,
            'Eric T. Bronola' => 17,
            'Charlemagne T. Lucero' => 17,
            'Trisha May T. Rodriguez' => 17,
            'Tessa L. Apostolero' => 18,
            'Angie M. Mendoza' => 18,
            'Zyril kaye D. Sarmiento' => 18,
            'Glenn Jr Y. Tejada' => 18,
            'Dianne G. Artita' => 19,
            'Danilo Jr. B. Cervantes' => 19,
            'Ma. Evelyn M. Dela Cruz' => 19,
            'Cecille Tabuena' => 19,
            'Lucille Ann B. Molina' => 20,
            'Wowie O. Pantila' => 20,
            'Angela T. Villanueva' => 20,
            'Joanne Rose T. Zafe' => 20,
            'Marisol S. Alano' => 21,
            'Joan T. Assuncion' => 21,
            'Robert T. Balambam' => 21,
            'Shaira Anne D. Reyes' => 21,
            'Michael B. Dogello' => 22,
            'Joshua L. Malasa' => 22,
            'Angelica O. Tatad' => 22,
            'Gherlaine T. Tomagan' => 22,
            'Geraldine V. Vicente' => 22,
            'Ryan Paul C. Molina' => 23,
            'John Wilfred T. Rodriguez' => 23,
            'Jose Miguel S. Maglaqui' => 23,
            'Milfred S. Guerrero' => 24,
            'John Earl T. Tejada' => 24,
            'Antonio E. Tupig' => 24,
            'Kenn Andrew S. Antonio' => 25,
            'Tracy G. Borbor' => 25,
            'Jose Emmanuel T. Castilla' => 25,
            'Jeric Jay Bolda' => 26,
            'Ralf Benedict Benjie Rodriguez' => 26,
            'Nick Leonard Sebastian' => 26,
            'Mac Aldrich Z. Abraham' => 27,
            'Maricar N. Abad' => 27,
            'John Mark T. Ledesma' => 27,
            'Cristine Mae D. De Leon' => 28,
            'Elaine Maglinte' => 28,
            'Evelyn O. Camacho' => 28,
            'Michael T. Llevarez' => 28,
            'Mario I. Magtagnob' => 29,
            'Marjon T. Tapar' => 29,
            'Randi Luise A. Tacorda' => 29,
            'Jomelle S. Cea' => 30,
            'Michael B. Gapagada' => 30,
            'Efren Reniel B. San Gaspar' => 30,
            'Raniel Avely D. Vargas' => 30,
            'Daryl B. Abainza' => 31,
            'Nicko R. Guerrero' => 31,
            'Francis Aldie U. Leonardo' => 31,
            'Aljohn P. Habana' => 32,
            'Maria Jinky B. Socao' => 32,
            'Ma. Nene Angela T. Tatualla' => 32,
            'Ma. Jocelle Paula M. Vargas' => 32,
            'Gerald T. Basallote' => 33,
            'Emmanuel Jr. II T. Somido' => 33,
            'Cherry Shaina S. Templonuevo' => 33,
            'Ralfh Edwin W. Panti' => 34,
            'Jefferson S. Aguilar' => 34,
            'Jon Matthew A. Talan' => 34,
            'Ian Lin B. Sarmiento' => 34,
            'John Gabriell Solero' => 35,
            'Mark John D. Sural' => 35,
            'Rochelle B. Ibatuan' => 35,
            'Maria Giezel A. Rodriguez' => 35,
            'Vincent Paul V. Buenaflor' => 35,
            'Kris V. Aquino' => 36,
            'Donesa May' => 36,
            'M. Matienzo' => 36,
            'Ian S. Icaramon' => 36,
            'Lorraine R. Del Valle' => 36,
            'Analie R. Fernandez' => 36,
        ];


        // Assuming you have already defined the $studentsWithResearchIDs array

        foreach ($studentsWithResearchIDs as $studentName => $researchID) {
            $names = explode(' ', $studentName);
            $firstName = $names[0];
            $middleName = count($names) > 2 ? $names[1] : null;
            $lastName = count($names) > 2 ? $names[2] : $names[1];

            // Generate a unique identifier
            $uniqueIdentifier = strtolower(str_replace(' ', '_', $studentName)) . '_' . $researchID;

            $student = new Student([
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'email' => strtolower($firstName . '.' . $lastName . '.' . $uniqueIdentifier . '@example.com'),
                'student_id' => fake('en_US')->unique()->numerify('20##-#####'),
                'research_id' => $researchID,
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
