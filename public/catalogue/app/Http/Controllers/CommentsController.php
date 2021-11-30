<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\User;
use App\Models\Comment;

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

    public function postComment(Request $request)
    {
        $title = $request->input("title");
        $content = $request->input("content");
        $userID = $request->input("userID");
        $mediaID = $request->input("mediaID");

        $data = [
            "title" => $title,
            "content" => $content,
            "ID_user" => $userID,
            "ID_media" => $mediaID,
        ];

        Comment::insert($data);

        return redirect('/medias/'.$mediaID.'/comments');
    }

    public function deleteComment(Request $request)
    {
        $commentID = $request->input("commentID");
        $comment = Comment::find($commentID);
        $comment->delete();
        return redirect( url()->current() );
    }

}