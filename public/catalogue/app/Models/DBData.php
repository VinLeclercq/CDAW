<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

use App\Models\Media;
use App\Models\Person;
use App\Models\Category;

class DBData extends Model
{
    use HasFactory;

    public static function getIdTopMovie()
    {
        $key = "187cf9fba8a31a9d85cf232a13033069";
        $idArray = array();
        $curl = curl_init();

        for ($i=1; $i <= 10; $i++) { 
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/top_rated?language=fr(FR&page=".$i."&api_key=".$key,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = json_decode(curl_exec($curl), true)["results"];

            foreach($response as $film)
            {
                array_push($idArray, $film["id"]);
            }
        }
        curl_close($curl);
        return $idArray;
    }

    public static function getDetailsMovie($idArray)
    {
        $key = "187cf9fba8a31a9d85cf232a13033069";
        $curl = curl_init();
        foreach($idArray as $id)
        {
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/".$id."?language=fr-FR&api_key=".$key,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            
            $film = json_decode(curl_exec($curl), true);

            $data = [   
                "backdrop_url" => "https://image.tmdb.org/t/p/original".$film["backdrop_path"],
                "poster_url" => "https://image.tmdb.org/t/p/original".$film["poster_path"],
                "release_date" => $film["release_date"],
                "name" => $film["title"],
                "description" => $film["overview"],
                "duration_time" => $film["runtime"],
                "type" => "Film",
                "status" => "Fini",
                "db_id" => $film["id"],
            ];

            $f = Media::create($data);

            foreach($film["genres"] as $category) {
                $c = Category::where('name', $category["name"])->get();
                $f->categories()->syncWithoutDetaching($c);
            }
        }
        curl_close($curl);
    }

    public static function getMovieCrewFromDB()
    {
        $key = "187cf9fba8a31a9d85cf232a13033069";
        $curl = curl_init();
        $movieArray = Media::where("type", "Film")->get();

        foreach($movieArray as $movie)
        {
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/".$movie->db_id."/credits?language=fr-FR&api_key=".$key,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));

            $crew = json_decode(curl_exec($curl), true);
            
            $actors = $crew["cast"];
            foreach($actors as $actor)
            {
                $a = Person::firstOrCreate(
                    ['name' => $actor["name"]],
                );

                $movie->actors()->syncWithoutDetaching($a);
            }
        
            $crew = $crew["crew"];
            foreach($crew as $member)
            {
                if($member["job"] == "Director")
                {
                    $d = Person::firstOrCreate(
                        ['name' => $member["name"]]
                    );
                    
                    $movie->directors()->syncWithoutDetaching($d);
                }
            }
        }
        curl_close($curl);
    }

    public static function getMovieCategoriesFromDB()
    {
        $key = "187cf9fba8a31a9d85cf232a13033069";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?language=fr-FR&api_key=".$key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $categories = json_decode(curl_exec($curl), true)["genres"];

        foreach($categories as $category)
        {
            Category::firstOrCreate(
                ['name' => $category["name"]],
            );
        }

        curl_close($curl);
    }

    public static function getTVCategoriesFromDB()
    {
        $key = "187cf9fba8a31a9d85cf232a13033069";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/genre/tv/list?language=fr-FR&api_key=".$key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $categories = json_decode(curl_exec($curl), true)["genres"];

        foreach($categories as $category)
        {
            Category::firstOrCreate(
                ['name' => $category["name"]],
            );
        }

        curl_close($curl);
    }

    public static function getMoviesFromDB()
    {
        $idArray = array();
        
        DBData::getMovieCategoriesFromDB();
        DBData::getTVCategoriesFromDB();

        $idArray = DBData::getIdTopMovie();
        DBData::getDetailsMovie($idArray);
        DBData::getMovieCrewFromDB();
    }
}
