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

    public function createPlaylist(Request $request, $userId)
    {
        $name = $request->input('name');
        if($request->has('is_public')){
            $is_public = true;
        }else{
            $is_public = false;
        }

        $data = [
            "is_public" => $is_public,
            "name" => $name
        ];

        $playlist = Playlist::create($data);
        $user = User::find($userId);
        $playlist->users_owning()->attach($user);

        return redirect()->back()->withInput();
    }

    public function deletePlaylist($playlistId)
    {
        $playlist = Playlist::find($playlistId);
        $playlist->delete();
        return redirect()->back()->withInput();
    }

    public function getUserPlaylist($userId)
    {
        $user = User::find($userId);
        $playlists = $user->playlist_owned;
        return view('myPlaylists', ['playlists' => $playlists, 'userId' => $userId]);
    }

    public function getUserSubscribedPlaylist($userId)
    {
        $user = User::find($userId);
        $playlists = $user->users_subscribed;
        return view('suscription', ['playlists' => $playlists]);
    }

}
