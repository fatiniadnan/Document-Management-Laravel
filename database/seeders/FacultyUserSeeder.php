<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\User;

class FacultyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = Faculty::all();

        User::all()->each(function ($user) use ($faculties) {
            $user->faculties()->attach(
                $faculties->random(1)->pluck('id')
            );
        });
    }
}
