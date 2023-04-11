<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cict = College::where('acroname','CICT')->value('id');

        DB::table('programs')->insert([
            'acroname' => 'BSCS',
            'name' => 'Bachelor of Science In Computer Science',
            'college_id' => $cict,
        ]);

        DB::table('programs')->insert([
            'acroname' => 'BSIS',
            'name' => 'Bachelor of Science In Information System',
            'college_id' => $cict,
        ]);

        DB::table('programs')->insert([
            'acroname' => 'BSIT',
            'name' => 'Bachelor of Science In Information Technology',
            'college_id' => $cict,
        ]);

        $cea = College::where('acroname','CEA')->value('id');

        DB::table('programs')->insert([
            'acroname' => 'BSCE',
            'name' => 'Bachelor of Science In Civil Engineering',
            'college_id' => $cea,
        ]);

        DB::table('programs')->insert([
            'acroname' => 'BSCpE',
            'name' => 'Bachelor of Science In Computer Engineering',
            'college_id' => $cea,
        ]);

        DB::table('programs')->insert([
            'acroname' => 'BSA',
            'name' => 'Bachelor of Science In Architecture',
            'college_id' => $cea,
        ]);
    }
}
