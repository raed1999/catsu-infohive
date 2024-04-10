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


        // Faculty 1 || Start 4
        $faculty1 = new Faculty([
            'first_name' => 'Janette',
            'middle_name' => '',
            'last_name' => 'Vargas',
            'email' => 'cict@mic4.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty1->save();

        // Faculty 2 | 5
        $faculty2 = new Faculty([
            'first_name' => 'Chiradel',
            'middle_name' => 'Dela Rosa',
            'last_name' => 'Tugay',
            'email' => 'cict@mic5.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty2->save();

        // Faculty 3 | 6
        $faculty3 = new Faculty([
            'first_name' => 'Aster Vivien',
            'middle_name' => 'C.',
            'last_name' => 'Vargas',
            'email' => 'cict@mic6.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty3->save();

        // Faculty 4 | 7
        $faculty4 = new Faculty([
            'first_name' => 'John Gregory',
            'middle_name' => 'M',
            'last_name' => 'Bola',
            'email' => 'cict@mic7.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty4->save();

        // Faculty 5 | 8
        $faculty5 = new Faculty([
            'first_name' => 'Daryl ',
            'middle_name' => 'O.',
            'last_name' => 'Pulvinar',
            'email' => 'cict@mic8.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty5->save();

        // Faculty 6 | 9
        $faculty6 = new Faculty([
            'first_name' => 'Ramona Michelle',
            'middle_name' => '',
            'last_name' => 'Magtangob',
            'email' => 'cict@mic9.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty6->save();

        // Faculty 7 | 10
        $faculty7 = new Faculty([
            'first_name' => 'Joy',
            'middle_name' => 'V',
            'last_name' => 'Santeices',
            'email' => 'cict@mic10.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty7->save();

        // Faculty 8 | 11
        $faculty8 = new Faculty([
            'first_name' => 'Mary Rose',
            'middle_name' => '',
            'last_name' => 'Alcantara',
            'email' => 'cict@mic11.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty8->save();

        // Faculty 9 | 12
        $faculty9 = new Faculty([
            'first_name' => 'Melkisedek',
            'middle_name' => 'O.',
            'last_name' => 'Ubalde',
            'email' => 'cict@mic12.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty9->save();

        // Faculty 10 | 13
        $faculty10 = new Faculty([
            'first_name' => 'Zcel',
            'middle_name' => 'T.',
            'last_name' => 'Tablizo',
            'email' => 'cict@mic13.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty10->save();

        // Faculty 11 | 14
        $faculty11 = new Faculty([
            'first_name' => 'Belen',
            'middle_name' => 'M',
            'last_name' => 'Tapado',
            'email' => 'cict@mic14.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty11->save();

        // Faculty 12 | 15
        $faculty12 = new Faculty([
            'first_name' => 'Ryan Neil',
            'middle_name' => 'A.',
            'last_name' => 'Lareza',
            'email' => 'cict@mic15.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty12->save();

        // Faculty 13 | 16
        $faculty12 = new Faculty([
            'first_name' => 'Merlijoy',
            'middle_name' => 'M.',
            'last_name' => 'Jamero',
            'email' => 'cict@mic16.com',
            'email_verified_at' => now(),
            'college_id' => $cict,
            'usertype_id' => Role::FACULTY,
            'added_by_id' => $cictDean,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $faculty12->save();





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
