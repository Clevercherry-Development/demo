<?php

namespace Database\Seeders;

use App\Models\Circuits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CircuitsStarter extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('circuits')->delete();

        Circuits::create([
            'name' => 'Spa-Francorchamps',
            'description' => 'Best track in the world',
            'laps' => 44,
            'distance' => 7.004,
            'location' => 'Belgium',
            'active' => true
        ]);

        Circuits::create([
            'name' => 'Silverstone',
            'description' => 'Boring track in Northamptonshire with too many Hamilton fans',
            'laps' => 52,
            'distance' => 5.891,
            'location' => 'United Kingdom',
            'active' => true
        ]);

        Circuits::create([
            'name' => 'Circuit of the Americas',
            'description' => 'Best American track',
            'laps' => 56,
            'distance' => 5.513,
            'location' => 'USA',
            'active' => true
        ]);
    }
}
