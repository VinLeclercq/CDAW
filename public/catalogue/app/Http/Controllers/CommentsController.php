<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\User;

class CommentsController extends Controller
{
    public function getMediaComments($mediaID)
    {
        $media = Media::find($mediaID);
        $comments = $media->comments->load('user');
        return view('mediaComments', ["comments" => $comments, "media" => $media]);
    }

    public function getUserComments($userID)
    {
        $user = User::find($userID);
        $comments = $user->comments->load('media');
        return view('userComments', ["comments" => $comments, "user" => $user]);
    }

}