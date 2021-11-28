<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Media;

class MediaTest extends TestCase
{
    public function test_add_media()
    {
        $data = [
            'name' => 'Test', 
            'duration' => '120', 
            'release' => '2021-11-21', 
            'synopsis' => 'Media Test', 
            'type' => 'Film', 
            'status' => 'Fini'
        ];

        $response = $this->post('/addMedia', $data);

        $media = Media::where('name', 'Test')->first();

        $this->assertNotNull($media);
    }
    
    public function test_add_media_redirection()
    {
        $data = [
            'name' => 'Redirect', 
            'duration' => '200', 
            'release' => '2021-05-11', 
            'synopsis' => 'Test redirection', 
            'type' => 'Film', 
            'status' => 'Fini'
        ];

        $response = $this->post('/addMedia', $data);

        $response->assertStatus(302);   
    }
    
    public function test_delete_media()
    {
        $data = [
            'name' => 'Test', 
            'duration_time' => '120', 
            'release_date' => '2021-11-21', 
            'description' => 'Media Test', 
            'type' => 'Film', 
            'status' => 'Fini'
        ];

        Media::create($data);
        $film = Media::where($data)->first();
        $idDelete = $film->id;
        $this->assertNotNull($film);
        $this->delete('/deleteMedia/' . $idDelete);
        $filmDeleted = Media::find($idDelete);
        $this->assertNull($filmDeleted);

    }
    
}
