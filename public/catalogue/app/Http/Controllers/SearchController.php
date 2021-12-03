<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Person;
use App\Models\Playlist;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $nameSearch =$request->input('nameSearch');

        switch($request->input("type")){
            case "Films":
                $result = Media::search($nameSearch)->where('type', 'Film')->paginate(20);
                return view('mediasListe', ["medias" => $result]);
                break;
            case "Séries":
                $result = Media::search($nameSearch)->where('type', 'Série')->paginate(20);
                return view('mediasListe', ["medias" => $result]);
                break;
            case "Personnes":
                $people = Person::search($nameSearch)->paginate(50);
                return view('personnesListe', ["people" => $people]);
                break;
            case "Playlist":
                return Playlist::search($nameSearch)->get();
                break;
            default:
                return view('mediasListe', ["medias" => Media::paginate(20)]);
                break;
        }
    }
}