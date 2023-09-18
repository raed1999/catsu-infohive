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
                'title' => fake()->catchPhrase() .' '.fake()->bs(),
                'abstract' => fake('en_US')->paragraph(20),
                'year' => fake()->dateTimeBetween('-5 years')->format('Y'),
                'keywords' => [fake('en_US')->word, fake('en_US')->word, fake('en_US')->word],
                'advisers_id' => fake('en_US')->numberBetween(2, 100),
                'faculty_in_charge_id' => fake('en_US')->numberBetween(2, 100),
            ]);

            $research->save();
        }
    }
}
