<?php

namespace Database\Seeders;

use App\Models\Research;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $research = new Research([
                'title' => fake()->sentence(13),
                'abstract' => fake()->paragraph(3),
                'year' => fake()->year(),
                'keywords' => [fake()->word, fake()->word, fake()->word],
                'advisers_id' => fake()->numberBetween(2, 9),
                'faculty_in_charge_id' => fake()->numberBetween(2, 9),
            ]);

            $research->save();
        }
    }
}
