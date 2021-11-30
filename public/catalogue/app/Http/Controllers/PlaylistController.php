<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\User;

class PlaylistController extends Controller
{
    // public function getAllPlaylist()
    // {
    //     $medias = Playlist::all();

    //     return view('playlists', ["playlists" => $playlists]);
    // }

    public function createPlaylist(Request $request)
    {
        $name = $request->input("name");


        $data = [
            "name" => $name
        ];

        $playlist = Playlist::create($data);
    }

    public function deletePlaylist($playlistId)
    {
        $playlist = Playlist::find($playlistId);
        $playlist->delete();
        return redirect('/playlists');
    }

    public function getUserPlaylist($userId)
    {
        $user = User::find($userId);
        $playlists = $user->playlist_owned;
        return view('myPlaylists', ['playlists' => $playlists]);
    }

    public function getUserSubscribedPlaylist($userId)
    {
        $user = User::find($userId);
        return $user->users_subscribed;
    }

}
