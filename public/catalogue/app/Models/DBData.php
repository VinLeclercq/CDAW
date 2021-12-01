<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;

class DBData extends Model
{
    use HasFactory;

    public static function getIdTop()
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
        $dataArray = array();
        $curl = curl_init();
        foreach($idArray as $i => $id)
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

            $dataArray[$i] =  
            [   
                "backdrop_url" => "https://image.tmdb.org/t/p/original".$film["backdrop_path"],
                "poster_url" => "https://image.tmdb.org/t/p/original".$film["poster_path"],
                "release_date" => $film["release_date"],
                "name" => $film["title"],
                "description" => $film["overview"],
                "duration_time" => $film["runtime"],
                "type" => "Film",
            ];
        }
        curl_close($curl);
        return $dataArray;
    }

    public static function getMoviesFromDB()
    {
        $idArray = array();
        $dataArray = array();

        $idArray = DBData::getIdTop();
        $dataArray = DBData::getDetailsMovie($idArray);
        //var_dump($dataArray);
        foreach($dataArray as $data)
        {
            Media::create($data);
        }
    }
}
