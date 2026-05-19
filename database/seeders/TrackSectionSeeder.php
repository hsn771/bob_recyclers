<?php

namespace Database\Seeders;

use App\Models\TrackSection;
use Illuminate\Database\Seeder;

class TrackSectionSeeder extends Seeder
{
    public function run(): void
    {
        TrackSection::firstOrCreate(
            ['position' => 1],
            ['title' => 'Upcoming Project']
        );
        TrackSection::firstOrCreate(
            ['position' => 2],
            ['title' => 'Recent Project']
        );
    }
}
