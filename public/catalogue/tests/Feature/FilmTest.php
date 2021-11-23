<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\film;

class FilmTest extends TestCase
{

    public function test_add_film()
    {
        $response = $this->post('/addFilm', ['name' => 'Oui Oui', 'director' => 'Non Non', 'category' => 2]);

    }
    
}
