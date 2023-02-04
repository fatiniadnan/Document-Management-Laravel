<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            'name' => 'Bachelor of Al-Quran and Al-Hadith'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Shariah'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Usuluddin'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Muamalat Management'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Shariah and Law'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Islamic Education (Islamic Studies)'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Islamic Education (Quranic Studies)'
        ]);

        DB::table('faculties')->insert([
            'name' => 'Bachelor of Islamic Studies and Science'
        ]);

    }
}
