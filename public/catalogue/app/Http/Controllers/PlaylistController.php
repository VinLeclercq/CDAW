<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\User;
use App\Models\Media;

class PlaylistController extends Controller
{
    public function getPlaylistById($playlistId){
        $playlist = Playlist::find($playlistId);
        return view('playlistDetails', ['playlist' => $playlist]);
    }

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

    public function getAllPublicPlaylist(Request $request){
        $field = $request->input('field') ?: "name";
        $order = $request->input('order') ?: "asc" ;

        $playlists = Playlist::where('is_public', true)->orderBy($field, $order)->paginate(20);
        return view('playlistsPublic', ["playlists" => $playlists]);
    }

    public function getUserSubscribedPlaylist($userId)
    {
        $user = User::find($userId);
        $playlists = $user->users_subscribed;
        return view('subscribed', ['playlists' => $playlists]);
    }

    public function subscribeToPlaylist($userId, $playlistId){
        $user = User::find($userId);
        $playlist = Playlist::find($playlistId);
        $playlist->users_subscribed()->attach($user);
        return redirect()->back()->withInput();
    }

    public function unsubscribeToPlaylist($userId, $playlistId){
        $user = User::find($userId);
        $playlist = Playlist::find($playlistId);
        $playlist->users_subscribed()->detach($user);
        return redirect()->back()->withInput();
    }

    public function addMediaToPlaylist($playlistId, $mediaId){
        $media = Media::find($mediaId);
        $playlist = Playlist::find($playlistId);
        $playlist->medias_in_playlist()->attach($media);
        return redirect()->back()->withInput();
    }

    public function dellMediaFromPlaylist($playlistId, $mediaId){
        $media = Media::find($mediaId);
        $playlist = Playlist::find($playlistId);
        $playlist->medias_in_playlist()->detach($media);
        return redirect()->back()->withInput();
    }

}
