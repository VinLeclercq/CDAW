<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Person;
use App\Models\Playlist;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $playlists = Auth::user() == null ? [] : Auth::user()->playlist_owned;
        $nameSearch = $request->input('nameSearch');

        switch($request->input("type")){
            case "Films":
                $result = Media::search($nameSearch)->where('type', 'Film')->paginate(20)->withQueryString();
                return view('mediasListe', ["medias" => $result, "playlists" => $playlists]);
                break;
            case "Séries":
                $result = Media::search($nameSearch)->where('type', 'Série')->paginate(20)->withQueryString();
                return view('mediasListe', ["medias" => $result, "playlists" => $playlists]);
                break;
            case "Personnes":
                $people = Person::search($nameSearch)->paginate(50)->withQueryString();
                return view('personnesListe', ["people" => $people, "playlists" => $playlists]);
                break;
            case "Playlist":
                $playlists = Playlist::search($nameSearch)->where('is_public', true)->get();
                return view('playlistsPublic', ["playlists" => $playlists]);
                break;
            default:
                return view('mediasListe', ["medias" => Media::paginate(20)]);
                break;
        }
    }
}