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
             'name' => 'Le voyage de Chihiro',
             'director' => 'Hayao Miyazaki',
             'category_id' => 1,
            ]);

    }
}
