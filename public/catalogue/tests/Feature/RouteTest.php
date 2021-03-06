<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase{

     /**
     * A basic test example.
     *
     * @return void
     */
    public function testRoutes()
    {
        $appURL = env('http://localhost:8080/catalogue/public');

        $urls = [
            '/categories',
            '/films',
            '/oneFilm',
            '/addFilm'
        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if((int)$response->status() !== 200){
                echo  $appURL . $url . ' (FAILED) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $appURL . $url . ' (success ?)';
                $this->assertTrue(true);
            }
            echo  PHP_EOL;
        }
    }
}
