<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film')->insert([
             'name' => 'La La Land',
             'director' => 'Damien Chazel',
             'category_id' => 2,
            ]);

        DB::table('film')->insert([
            'name' => 'Le voyage de Chihiro',
            'director' => 'Hayao Miyazaki',
            'category_id' => 4,
            ]);

        DB::table('film')->insert([
            'name' => '120 Battements Par Minute',
            'director' => 'Robin Campillo',
            'category_id' => 3,
            ]);

    }
}
