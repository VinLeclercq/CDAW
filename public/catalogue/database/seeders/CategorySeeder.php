<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Etape 1
        DB::table('categories')->insert([
             'name' => "Comédie musicale"
            ]);

        DB::table('categories')->insert([
            'name' => "Drame"
            ]);

        DB::table('categories')->insert([
            'name' => "Animation"
            ]);
    }
}
