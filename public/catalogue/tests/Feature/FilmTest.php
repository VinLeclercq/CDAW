<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\film;

class FilmTest extends TestCase
{

    public function test_add_film()
    {
        $this->post('/addFilm', ['name' => 'Oui Oui', 'director' => 'Non Non', 'category' => 2]);

        $film = film::where('name', 'Oui Oui')->first();
        $this->assertNotNull($film);
    }

    public function test_add_film_redirection()
    {
        $response = $this->post('/addFilm', ['name' => 'Oui Oui', 'director' => 'Non Non', 'category' => 2]);

        $response->assertStatus(302);   
    }

    public function test_delete_film()
    {
        $data = [
            'name' => 'Test Delete',
            'director' => 'Deleter',
            'category_id' => 3
        ];

        film::create($data);
        $film = film::where($data)->first();

        $idDelete = $film->id;

        $this->assertNotNull($film);

        $this->delete('/deleteFilm/' . $idDelete);

        $filmDeleted = film::find($idDelete);

        $this->assertNull($filmDeleted);

    }
    
}
