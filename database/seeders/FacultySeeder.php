<?php

namespace Database\Seeders;

use App\Constants\Role;
use App\Models\College;
use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         *  Default admin account
         *
         * */
        $faculty = new Faculty([
            'id' => 1,
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'college_id' => 1,
            'usertype_id' => Role::ADMIN,
            'added_by_id' => Role::ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();


        /* CICT Default Accounts */

        /* Dean */
        $cict = College::where('acroname', 'CICT')->value('id');
        $faculty = new Faculty([
            'first_name' => 'Ma. Emmie',
            'middle_name' => 'Tacorda',
            'last_name' => 'Dellusa',
            'email' => 'cict@dean.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::DEAN,
            'added_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        /* Clerk */
        $cictDean = Faculty::where('email', 'cict@dean.com')->value('id');
        $faculty = new Faculty([
            'first_name' => 'Gerinina Niña',
            'middle_name' => 'Narcelles',
            'last_name' => 'Reyes',
            'email' => 'cict@clerk.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::CLERK,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        /* Other Teaching Faculties */
        $faculty = new Faculty([
            'first_name' => 'Belen',
            'middle_name' => 'M',
            'last_name' => 'Tapado',
            'email' => 'cict@tapado.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Gemma',
            'middle_name' => 'G',
            'last_name' => 'Acedo',
            'email' => 'cict@acedo.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Joy',
            'middle_name' => 'V',
            'last_name' => 'Santelices',
            'email' => 'cict@santelices.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Janette',
            'middle_name' => 'V',
            'last_name' => 'Lucre',
            'email' => 'cict@lucre.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Ma. Antonia',
            'middle_name' => 'E',
            'last_name' => 'Rojas',
            'email' => 'cict@rojas.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Chiradel',
            'middle_name' => 'D',
            'last_name' => 'Tugay',
            'email' => 'cict@tugay.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Aster Vivien',
            'middle_name' => 'C',
            'last_name' => 'Vargas',
            'email' => 'cict@aster.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Daryl',
            'middle_name' => 'O',
            'last_name' => 'Pulvinar',
            'email' => 'cict@daryl.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Ramona Michelle',
            'middle_name' => '',
            'last_name' => 'Magtangob',
            'email' => 'cict@mic.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        $faculty = new Faculty([
            'first_name' => 'Mary Rose',
            'middle_name' => '',
            'last_name' => 'Alcantara',
            'email' => 'cict@alcantara.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();



        /* Randomize Faculty */

    /*     for ($i = 0; $i < 100; $i++) {

            $faculty = new Faculty([
                'first_name' => fake()->firstName(),
                'middle_name' => fake()->lastName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->email(),
                'email_verified_at' => now(),
                'college_id' => $cict,
                'usertype_id' => Role::FACULTY,
                'added_by_id' => $cictDean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            $faculty->save();
        } */

        /* CEA Default Accounts */

        $cea = College::where('acroname', 'CEA')->value('id');
        $faculty = new Faculty([
            'first_name' => 'Pedro Jr.',
            'middle_name' => 'R',
            'last_name' => 'Arcilla',
            'email' => 'cea@dean.com',
            'email_verified_at' => now(),
            'college_id' => $cea,
            'usertype_id' => Role::DEAN,
            'added_by_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();

        /* Clerk */
        $ceaDean = Faculty::where('email', 'cea@dean.com')->value('id');
        $faculty = new Faculty([
            'first_name' => 'Jone',
            'middle_name' => 'Wolf',
            'last_name' => 'Doe',
            'email' => 'cea@clerk.com',
            'email_verified_at' => now(),
            'college_id' => $cea,
            'usertype_id' => Role::CLERK,
            'added_by_id' => $ceaDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faculty->save();
    }
}
