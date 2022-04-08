<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [

            'Principal I',
            'Principal II',
            'Principal III',
            'Principal IV',
            'Head Teacher I',
            'Head Teacher II',
            'Head Teacher III',
            'Head Teacher IV',
            'Head Teacher VI',
            'Master Teacher I',
            'Master Teacher II',
            'Master Teacher III',
            'Master Teacher IV',
            'Teacher I',
            'Teacher II',
            'Teacher III',
            'Executive Officer I',
            'Executive Officer II',
            'Guidance Counselor I',
            'Guidance Counselor II',
            'School Registrar, Administrative Aide',
            'School Nurse',
            'Security Officer',
        ];
        foreach ($positions as $position) {
            Position::create(['description' => $position]);
        }
    }
}
