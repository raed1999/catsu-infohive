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
        DB::table('faculties')->insert([
            'id' => 1 ,
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'college_id' => 1,
            'usertype_id' => Role::ADMIN,
            'added_by_id' => Role::ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        /* CICT Default Accounts */

        /* Dean */
        $cict = College::where('acroname', 'CICT')->value('id');
        DB::table('faculties')->insert([
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

        /* Clerk */
        $cictDean = Faculty::where('email', 'cict@dean.com')->value('id');
        DB::table('faculties')->insert([
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

        /* Other Teaching Faculties */

        DB::table('faculties')->insert([
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

        DB::table('faculties')->insert([
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

        DB::table('faculties')->insert([
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

        DB::table('faculties')->insert([
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

        DB::table('faculties')->insert([
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

        /* CEA Default Accounts */

        $cea = College::where('acroname', 'CEA')->value('id');
        DB::table('faculties')->insert([
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
    }
}
